<?php

namespace App\UI\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\UI\Dto\ContactDto;

/**
 * Undocumented class
 */
class ContactMailEvent extends Event
{
    const MAIL_CONTACT_EVENT = 'app.mails.contact';
    
    /**
     * @var ContactDto
     */
    protected $contact;

    /**
     * ContactMailEvent constructor.
     *
     * @param ContactDto $contact
     */
    public function __construct(
        ContactDto $contact
    ) {
        $this->contact = $contact;
    }

    /**
     * @return ContactDTO
     */
    public function getContact(): ContactDto
    {
        return $this->contact;
    }
}
