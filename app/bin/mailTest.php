<?php
require_once ('../vendor/autoload.php');
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

$transport = Transport::fromDsn('smtp://95e97289183527:70e7b46e8e963a@smtp.mailtrap.io:2525?encryption=tls&auth_mode=login');
$mailer = new Mailer($transport);

$email = (new Email())
->from('hello@example.com')
->to('you@example.com')
//->cc('cc@example.com')
//->bcc('bcc@example.com')
//->replyTo('fabien@example.com')
//->priority(Email::PRIORITY_HIGH)
->subject('Time for Symfony Mailer!')
->text('Sending emails is fun again! Hello from Siebe')
->html('<p>See Twig integration for better HTML integration!</p>');

$mailer->send($email);
