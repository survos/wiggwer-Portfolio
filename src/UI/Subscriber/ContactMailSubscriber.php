<?php

namespace App\UI\Subscriber;

use App\UI\Subscriber\AbstractMailSubscriber;
use App\UI\Event\ContactMailEvent;

/**
 * Class ContactMailSubscriber
 */
class ContactMailSubscriber extends AbstractMailSubscriber
{
    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            ContactMailEvent::MAIL_CONTACT_EVENT => 'onContactForm',
        ];
    }

    /**
     * Undocumented function
     *
     * @param ContactMailEvent $event
     *
     * @return void
     */
    public function onContactForm(ContactMailEvent $event)
    {
        $this->mailHelper->send(
            [
                'email' => $event->getContact()->getEmail(),
                'name' => sprintf(
                    '%s %s',
                    $event->getContact()->getEmail(),
                    $event->getContact()->getName()
                ),
                'subject' => $event->getContact()->getSubject(),
                'message' => $event->getContact()->getMessage()
            ],
            [
                'email' => $this->paramsMailApp['email'],
                'name' => $this->paramsMailApp['name'],
                'subject' => $this->paramsMailApp['subject'],
                'message' => $this->paramsMailApp['message']
            ],
            'Demande information',
            'mail/email.html.twig',
            [
                'contact' => $event->getContact(),
            ]
        );
    }
}
