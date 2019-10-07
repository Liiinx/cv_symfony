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
     * @param AboutRepository $aboutRepository
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
    public function index(AboutRepository $aboutRepository, SkillRepository $skillRepository,
                          ExperienceRepository $experienceRepository, EducationRepository $educationRepository,
                          ProjectRepository $projectRepository, RecommendationRepository $recommendationRepository,
                          Request $request, Swift_Mailer $mailer, Email $email)
    {
        $about = $aboutRepository->findOneBy(['id' => '1']);
        /*$about = $this->getDoctrine()
            ->getRepository(About::class)
            ->findOneBy(['id' => '1']);*/

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
            'about' => $about,
            'skills' => $skillRepository->findAll(),
            'experiences' => $experienceRepository->findBy([],['id' => 'desc']), // premier paramètre tableau vide = findAll()
            'educations' => $educationRepository->findBy([],['id' => 'desc']),
            'projects' => $projectRepository->findBy([],['id' => 'desc']),
            'recommendations' => $recommendationRepository->findAll(),
            'form' => $form->createView(),
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
