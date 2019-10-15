<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\AboutRepository;
use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\FooterRepository;
use App\Repository\ProjectRepository;
use App\Repository\RecommendationRepository;
use App\Repository\SkillRepository;
use App\Service\Email;
use App\Service\Validator;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ReCaptcha\ReCaptcha;

class CvController extends AbstractController
{
    /**
     * @Route("/", name="cv")
     * @param SkillRepository $skillRepository
     * @param ExperienceRepository $experienceRepository
     * @param EducationRepository $educationRepository
     * @param ProjectRepository $projectRepository
     * @param RecommendationRepository $recommendationRepository
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @param Email $email
     * @return Response
     */
    public function index(SkillRepository $skillRepository, ExperienceRepository $experienceRepository,
                          EducationRepository $educationRepository, ProjectRepository $projectRepository,
                          RecommendationRepository $recommendationRepository,
                          Request $request, Swift_Mailer $mailer, Email $email)
    {
//        test appel fonction
//        $skills = $this->mySkill($skillRepository);

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            // captcha google
            //$siteKey = '6Lc6TJUUAAAAAFs4y5MYlJezrHdyS02JOQMCsCSF'; // votre clé publique
            $secret = 'secret key'; // votre clé privée

            $reCaptcha = new ReCaptcha($secret);
            $resp = $reCaptcha->verify($request->request->get('g-recaptcha-response'));
            if ($resp->isSuccess()) {
                // Verified!
                $email->sendMail($mailer, $data);
                $array["isSuccess"] = true;
                return $this->json($array);
            } else {
                $array["captchaError"] = "merci de valider le captcha";
                $array["isSuccess"] = false;
            return $this->json($array);

            }
        }

        return $this->render('cv/index.html.twig', [
//            'about' => $about,
            'skills' => $skillRepository->findAll(),
            'experiences' => $experienceRepository->findBy([],['id' => 'desc']), // premier paramètre tableau vide = findAll()
            'educations' => $educationRepository->findBy([],['id' => 'desc']),
            'projects' => $projectRepository->findBy([],['id' => 'desc']),
            'recommendations' => $recommendationRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param AboutRepository $aboutRepository
     * @param Validator $validator
     * @return Response
     */
    public function aboutMe(AboutRepository $aboutRepository, Validator $validator)
    {
        $about = $aboutRepository->findOneBy(['id' => '1']);
        /*$about = $this->getDoctrine()
            ->getRepository(About::class)
            ->findOneBy(['id' => '1']);*/

        $unsplashClientId = 'e6f97882a8602f70c4ced32ebe64c457ceb0dd56c668742fe174a0c308144852';
        $query = urlencode($about->getUnsplashBgImage());
        $url = 'https://api.unsplash.com/photos/random/?query=' .$query. '&featured&orientation=landscape&client_id=' . $unsplashClientId;
        //over 50 requests per hour, $url return 403, so test this url.
        $codeResponse = $validator->verifyHttpCode($url);
        if ($codeResponse === 200) {
            // Use file_get_contents to GET the URL in question.
            // the True parameter makes this array as associative.
            $contents = json_decode(file_get_contents($url), TRUE);
            $unsplashContent['url'] = $contents['urls']['regular'];
            $unsplashContent['userName'] = $contents['user']['name'];
            $unsplashContent['link'] = $contents['user']['links']['html'];
        } else {
            $unsplashContent = false;
        }

        return $this->render('cv/about.html.twig', [
            'about' => $about,
            'unsplashContent' => $unsplashContent,
        ]);
    }

    /**
     * @param FooterRepository $footerRepository
     * @return Response
     */
    public function myFooter(FooterRepository $footerRepository)
    {
        $footerLinks = $footerRepository->findAll();
        return $this->render('footer.html.twig', [
           'footerLinks' => $footerLinks,
        ]);

    }
}
