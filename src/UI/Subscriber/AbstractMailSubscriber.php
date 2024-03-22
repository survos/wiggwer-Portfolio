<?php

namespace App\UI\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
//use App\UI\Utils\MailHelper;

/**
 * Class AbstractMailSubscriber
 */
abstract class AbstractMailSubscriber implements EventSubscriberInterface
{
    /** 
     * @var array 
     */
    protected $paramsMailApp;

    /**
     * AbstractMailSubscriber constructor.
     */
    public function __construct(array $paramsMailApp)
    {
        $this->paramsMailApp = $paramsMailApp;
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