<?php

namespace App\UI\Handler;

use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use App\UI\Event\FlashMessageEvent;
use App\UI\Event\ContactMailEvent;

/**
 * Class ContactHandler
 *
 * @package App\UI\Handler
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
     public function __construct(EventDispatcherInterface $eventDispatcher)
     {
         $this->eventDispatcher = $eventDispatcher;
     }

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
     public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->eventDispatcher->dispatch(new ContactMailEvent($data));
            $this->eventDispatcher->dispatch(
                new FlashMessageEvent(
                    'success',
                    'Votre message a été envoyé avec succés.'
                )
            );

            return true;
        }

        return false;
    }
}