<?php

namespace Services;
use Symfony\Bridge\Twig\Mime\BodyRenderer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Mailer\EventListener\MessageListener;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Twig\Environment as TwigEnvironment;

class MailService
{
    static function send(TwigEnvironment $twig, string $from, string $to, string $subject, string $template, array $parameters=['']){

        $messageListener = new MessageListener(null, new BodyRenderer($twig));

        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($messageListener);

        $transport = Transport::fromDsn('smtp://'.EMAIL_USER.':'.EMAIL_PASS.'@'.EMAIL_HOST.':'.EMAIL_PORT.'?'.EMAIL_OPTIONS , $eventDispatcher);
        $mailer = new Mailer($transport, null, $eventDispatcher);

        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($parameters)
        ;
        $mailer->send($email);

    }
}