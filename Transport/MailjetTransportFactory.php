<?php


namespace Symfony\Component\Mailer\Bridge\Mailjet\Tests\Transport;

use Symfony\Component\Mailer\Exception\UnsupportedSchemeException;
use Symfony\Component\Mailer\Transport\TransportInterface;

class MailjetTransportFactory
{
    public function create(Dsn $dsn): TransportInterface
    {
        $scheme = $dsn->getScheme();
        $user = $dsn->getUser();
        $password = $dsn->getPassword();

        if ('mailjet+smtp' === $scheme || 'mailjet+smtps' === $scheme || 'mailjet' === $scheme) {
            return new MailjetSmtpTransport($user, $password, $this->dispatcher, $this->logger);
        }

        throw new UnsupportedSchemeException($dsn, 'mailjet', $this->getSupportedSchemes());
    }

    protected function getSupportedSchemes(): array
    {
        return ['mailjet', 'mailjet+api', 'mailjet+smtp', 'mailjet+smtps'];
    }
}