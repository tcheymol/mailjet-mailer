<?php


namespace Symfony\Component\Mailer\Bridge\Mailjet\Tests\Transport;


use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class MailjetSmtpTransport extends EsmtpTransport
{
    public function __construct(string $username, string $password, EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null)
    {
        parent::__construct('in-v3.mailjet.com', 465, true, $dispatcher, $logger);

        $this->setUsername($username);
        $this->setPassword($password);
    }
}
