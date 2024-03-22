<?php

namespace App\UI\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\UI\Dto\ContactDto;

/**
 * Class ContactMailEvent
 *
 * @package App\UI\Event
 */
class ContactMailEvent extends Event
{
    /**
     * @var ContactDto
     */
    protected $contact;

    /**
     * ContactMailEvent constructor.
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