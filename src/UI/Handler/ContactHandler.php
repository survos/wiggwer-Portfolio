<?php

namespace App\UI\Handler;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use App\UI\Event\FlashMessageEvent;
use App\UI\Event\ContactMailEvent;

/**
 * Undocumented class
 */
class ContactHandler
{
    /**
    *  @var EventDispatcherInterface
    */
    protected $eventDispatcher;

    /**
     * ContactHandler constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
         EventDispatcherInterface $eventDispatcher
     ) {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Undocumented function
     *
     * @param FormInterface $form

     * @return boolean
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->eventDispatcher->dispatch(new ContactMailEvent($data));
            $this->eventDispatcher->dispatch(
                new FlashMessageEvent(
                    'success',
                    'flash.contact.success'
                )
            );

            return true;
        }

        return false;
    }
}
