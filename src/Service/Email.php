<?php


namespace App\Service;


use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Email extends AbstractController
{

    public function sendMail( Swift_Mailer $mailer, $data)
    {
        $message = (new \Swift_Message('test'))
            ->setFrom('ftuffreaud@gmail.com')
            ->setTo('felix.tuffreaud@laposte.net')
            ->setBody($this->renderView('cv/contactMessageTemplate.html.twig',
                ['data' => $data]),
                'text/html'
            )
        ;
        $mailer->send($message);
    }
}