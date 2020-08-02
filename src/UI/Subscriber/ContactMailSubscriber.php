<?php

namespace App\UI\Subscriber;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use App\UI\Subscriber\AbstractMailSubscriber;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use App\UI\Event\ContactMailEvent;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\Email;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;
use Twig\Environment;
use function is_null;

/**
 * Class ContactMailSubscriber
 *
 * @package App\UI\Subscriber
 */
class ContactMailSubscriber extends AbstractMailSubscriber
{
    /**
     * @var string
     */
    private $dsn;

    /**
     * @var Environment
     */
    protected $templating;

    /**
     * ContactMailSubscriber constructor.
     *
     * @param string $dsn
     * @param Environment $templating
     * @param array $paramsMailApp
     */
    public function __construct(string $dsn, Environment $templating, array $paramsMailApp)
    {
        $this->dsn = $dsn;
        $this->templating = $templating;
        parent::__construct($paramsMailApp);
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            ContactMailEvent::class => 'onContactForm',
        ];
    }

    /**
     * @param ContactMailEvent $event
     *
     * @throws TransportExceptionInterface
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function onContactForm(ContactMailEvent $event)
    {
        $email = (new Email())
            ->from(new Address($event->getContact()->getEmail(),
                sprintf('%s %s',
                    $event->getContact()->getName(),
                    $event->getContact()->getEmail()
                )))
            ->to(
                new Address(
                    $this->paramsMailApp['email'],
                    $this->paramsMailApp['name']
                )
            )
            ->subject('Demande information')
            ->html(
                $this->templating->render(
                    'mail/email.html.twig',
                    [
                        'contact' => $event->getContact(),
                    ]
                )
            );

        $this->getMailer()->send($email);
    }

    /**
     * @return Mailer
     */
    private function getMailer(): Mailer
    {
        static $mailer;

        if (is_null($mailer)) {
            $mailer = new Mailer(Transport::fromDsn($this->dsn));
        }

        return $mailer;
    }
}
