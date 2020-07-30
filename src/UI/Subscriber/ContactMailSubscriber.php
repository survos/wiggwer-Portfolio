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
                    $event->getContact()->getFirstname(),
                    $event->getContact()->getLastname()
                ),
            ],
            [
                'email' => $this->paramsMailApp['email'],
                'name' => $this->paramsMailApp['name'],
            ],
            'Demande information',
            'mails/contact.html.twig',
            [
                'contact' => $event->getContact(),
            ]
        );
    }
}