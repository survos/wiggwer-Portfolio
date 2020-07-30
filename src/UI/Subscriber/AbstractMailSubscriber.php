<?php

namespace App\UI\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\UI\Utils\MailHelper;

/**
 * Class AbstractMailSubscriber
 */
class AbstractMailSubscriber implements EventSubscriberInterface
{
    /** 
     * @var array 
     */
    protected $paramsMailApp;

    /** 
     * @var MailHelper 
     */
    protected $mailHelper;

    /** 
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * AbstractMailSubscriber constructor.
     *
     * @param array               $paramsMailApp
     * @param MailHelper          $mailHelper
     * @param TranslatorInterface $translator
     */
    public function __construct(
        array $paramsMailApp,
        MailHelper $mailHelper,
        TranslatorInterface $translator
    ) {
        $this->paramsMailApp = $paramsMailApp;
        $this->mailHelper = $mailHelper;
        $this->translator = $translator;
    }

    /**
     * @codeCoverageIgnore
     * 
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [];
    }
}