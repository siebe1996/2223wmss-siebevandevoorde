<?php
require_once ('../vendor/autoload.php');
use Symfony\Bridge\Twig\Mime\BodyRenderer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Mailer\EventListener\MessageListener;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Twig\Environment as TwigEnvironment;

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../resources/templates');
$twig = new \Twig\Environment($loader);
$messageListener = new MessageListener(null, new BodyRenderer($twig));

$eventDispatcher = new EventDispatcher();
$eventDispatcher->addSubscriber($messageListener);

$transport = Transport::fromDsn('smtp://95e97289183527:70e7b46e8e963a@smtp.mailtrap.io:2525?encryption=tls&auth_mode=login', $eventDispatcher);
$mailer = new Mailer($transport, null, $eventDispatcher);

$email = (new TemplatedEmail())
// ...
        ->from('hello@example.com')
    ->to('antwerpen@parking.com')
->htmlTemplate('demo09.twig')
->context([
/*'expiration_date' => new \DateTime('+7 days'),
'username' => 'foo',*/
    'name' => 'paljas',
])
;
$mailer->send($email);
