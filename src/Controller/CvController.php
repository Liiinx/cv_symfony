<?php

namespace App\Controller;

use App\Entity\About;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\AboutRepository;
use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\ProjectRepository;
use App\Repository\RecommendationRepository;
use App\Repository\SkillRepository;
use App\Service\Validator;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
     * @return Response
     */
    public function index(AboutRepository $aboutRepository, SkillRepository $skillRepository,
                          ExperienceRepository $experienceRepository, EducationRepository $educationRepository,
                          ProjectRepository $projectRepository, RecommendationRepository $recommendationRepository,
                          Request $request, Swift_Mailer $mailer)
    {
        $about = $aboutRepository->findOneBy(['id' => '1']);
        /*$about = $this->getDoctrine()
            ->getRepository(About::class)
            ->findOneBy(['id' => '1']);*/

//        test appel fonction
//        $skills = $this->mySkill($skillRepository);

        // add form without a data class
//        $defaultData = ['message' => 'Type your message here', 'email' => 'Votre email',];
        /*$form = $this->createFormBuilder()
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('phone', TextType::class, ['required'   => false])
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('envoyer', SubmitType::class)
            ->getForm();*/

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            $secret = '6Lc6TJUUAAAAABA6OMvpmBb7Z6BCohyCtqE1wHqv'; // votre clé privée
            $reCaptcha = new ReCaptcha($secret);
            $resp = $reCaptcha->verify($request->request->get('g-recaptcha-response'));
            if ($resp->isSuccess()) {
                // Verified!
                $message = (new \Swift_Message('test'))
                    ->setFrom('ftuffreaud@gmail.com')
                    ->setTo('felix.tuffreaud@laposte.net')
                    ->setBody($this->renderView('cv/contactMessageTemplate.html.twig',
                           ['data' => $data]),
                        'text/html'
                    )
                ;
                $mailer->send($message);

            } else {
                $errors = $resp->getErrorCodes();
                $this->addFlash(
                    'warning',
                    'Your changes were saved!'
                );
            }
            return $this->redirectToRoute('cv', ['_fragment' => 'contact']);
        }

        return $this->render('cv/index.html.twig', [
            'about' => $about,
            'skills' => $skillRepository->findAll(),
            'experiences' => $experienceRepository->findBy([],['id' => 'desc']), // premier paramètre tableau vide = findAll()
            'educations' => $educationRepository->findBy([],['id' => 'desc']),
            'projects' => $projectRepository->findAll(),
            'recommendations' => $recommendationRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param SkillRepository $skillRepository
     * @return Response
     */

   /* public function mySkill(SkillRepository $skillRepository)
    {
        $skills = $skillRepository->findAll();

        return $this->render('cv/skill.html.twig', [
           'skills' => $skills,
        ]);

    }*/


    /**
     * @Route("/contact_form", name="contact_form")
     * @param Validator $validator
     * @param $mailer
     * @return JsonResponse
     */
   public function contactFormSubmit(Validator $validator, Swift_Mailer $mailer)
   {
       //$siteKey = '6Lc6TJUUAAAAAFs4y5MYlJezrHdyS02JOQMCsCSF'; // votre clé publique
       $secret = '6Lc6TJUUAAAAABA6OMvpmBb7Z6BCohyCtqE1wHqv'; // votre clé privée

       $array = ["firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "",
           "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "",
           "captchaError" => "", "isSuccess" => false];
       $emailTo = "felix.tuffreaud@laposte.net";

       if ($_SERVER['REQUEST_METHOD'] == "POST") {
           $array["firstname"] = $validator->verifyInput($_POST['firstname']);
           $array["name"] = $validator->verifyInput($_POST['name']);
           $array["email"] = $validator->verifyInput($_POST['email']);
           $array["phone"] = $validator->verifyInput($_POST['phone']);
           $array["message"] = $validator->verifyInput($_POST['message']);
           $array["isSuccess"] = true;
           $emailText = "";

           if (empty($array["firstname"])) {
               $array["firstnameError"] = "Merci de renseigner ton prénom !";
               $array["isSuccess"] = false;
           } else {
               $emailText .= "Firstname: {$array["firstname"]}\n";
           }
           if (empty($array["name"])) {
               $array["nameError"] = "Ton nom aussi !";
               $array["isSuccess"] = false;
           } else {

               $emailText .= "Name: {$array["name"]}\n";
           }
           if (!$validator->isEmail($array["email"])) {
               $array["emailError"] = "Merci d'indiquer un email valide";
               $array["isSuccess"] = false;
           } else {
               $emailText .= "Email: {$array["email"]}\n";
           }
           if (!$validator->isPhone($array["phone"])) {
               $array["phoneError"] = "Seulement des chiffres et des espaces";
               $array["isSuccess"] = false;
           } else {
               $emailText .= "Phone: {$array["phone"]}\n";
           }
           if (empty($array["message"])) {
               $array["messageError"] = "Tu peux indiquer ton message ici !";
               $array["isSuccess"] = false;
           } else {
               $emailText .= "Message: {$array["message"]}\n";
           }

           //captcha
           $reCaptcha = new ReCaptcha($secret);
           if(isset($_POST["g-recaptcha-response"])) {
               $resp = $reCaptcha->verify(
                   $_SERVER["REMOTE_ADDR"],
                   $_POST["g-recaptcha-response"]
               );
               if ($resp->isSuccess()) {
                   //echo "CAPTCHA OK";
                   //ne rien faire
               } else {
                   // ajouter le message d'erreur du captcha
                   $array["captchaError"] = "merci de valider le captcha";
                   $array["isSuccess"] = false;
               }
           }

           // en cas de success envoyer le mail
           if ($array["isSuccess"]) {
               $message = (new \Swift_Message('test'))
                   ->setFrom('ftuffreaud@gmail.com')
                   ->setTo($emailTo)
                   ->setBody($emailText,
//                       $this->renderView('emails/addArticle.html.twig',
//                           ['article' => $article]),
                       'text/html'
                   )
               ;
               $mailer->send($message);
           }
//           return json_encode($array);
           return $this->json($array);
       }
   }

}