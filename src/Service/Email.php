<?php


namespace App\Service;


use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\About;

class Email extends AbstractController
{

    public function sendMail( Swift_Mailer $mailer, $data)
    {
        $about = $this->getDoctrine()
            ->getRepository(About::class)
            ->findOneBy(['id' => '1']);
        $email = $about->getEmail();

        $message = (new \Swift_Message('Nouveau contact'))
            ->setFrom($email)
            ->setTo($email)
            ->setBody($this->renderView('cv/contactMessageTemplate.html.twig',
                ['data' => $data]),
                'text/html'
            )
        ;
        $mailer->send($message);
    }
}