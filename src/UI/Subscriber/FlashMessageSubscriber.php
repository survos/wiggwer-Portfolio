<?php

namespace App\UI\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
//use Symfony\Contracts\Translation\TranslatorInterface;
use App\UI\Event\FlashMessageEvent;

/**
 * Class FlashMessageSubscriber
 *
 * @package App\UI\Subscriber
 */
class FlashMessageSubscriber implements EventSubscriberInterface
{
//    /**
//     * @var TranslatorInterface
//     */
//    protected $translator;

    /** 
     * @var SessionInterface 
     */
    protected $session;

    /**
     * FlashMessageSubscriber constructor.
     *
     * @param SessionInterface    $session
     */
    public function __construct(
        SessionInterface $session
    ) {
        $this->session = $session;
    }

    /**
     * @return array
     *
     * @codeCoverageIgnore
     */
    public static function getSubscribedEvents()
    {
        return [
            FlashMessageEvent::class => 'onAddFlash',
        ];
    }

    /**
     * @param FlashMessageEvent $event
     */
    public function onAddFlash(FlashMessageEvent $event)
    {
        $flashbag = $this->session->getFlashBag();
        $flashbag->add(
            $event->getType(),
            $event->getKey()
        );
    }
}