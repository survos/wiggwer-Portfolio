<?php

namespace App\UI\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\UI\Event\FlashMessageEvent;

/**
 * Class FlashMessageSubscriber
 */
class FlashMessageSubscriber implements EventSubscriberInterface
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * FlashMessageSubscriber constructor.
     *
     * @param TranslatorInterface $translator
     * @param SessionInterface    $session
     */
    public function __construct(
        TranslatorInterface $translator,
        SessionInterface $session
    ) {
        $this->translator = $translator;
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
            FlashMessageEvent::FLASH_MESSAGE => 'onAddFlash',
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
            $event->isTranslatable() ?
                $this->translator->trans($event->getKey(), [], 'messages') : $event->getKey()
        );
    }
}
