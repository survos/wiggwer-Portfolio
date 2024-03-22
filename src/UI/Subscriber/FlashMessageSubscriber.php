<?php

namespace App\UI\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
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
        private RequestStack $requestStack
    ) {
    }

    public function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();

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

    public function onAddFlash(FlashMessageEvent $event): void
    {
        $flashbag = $this->session->getFlashBag();
        $flashbag->add(
            $event->getType(),
            $event->getKey()
        );
    }
}
