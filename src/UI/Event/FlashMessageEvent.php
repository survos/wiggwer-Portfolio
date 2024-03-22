<?php

namespace App\UI\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class FlashMessageEvent
 *
 * @package App\UI\Event
 */
class FlashMessageEvent extends Event
{
    public const FLASH_MESSAGE = 'app.flash_message';

    /** 
     * @var string 
     */
    protected $type;

    /** 
     * @var string 
     */
    protected $key;

    /** 
     * @var bool 
     */
    //protected $translatable;
    /**
     * FlashMessageEvent constructor.
     */
    public function __construct(
        string $type,
        string $key
        //bool $translatable = true
    ) {
        $this->type = $type;
        $this->key = $key;
        //$this->translatable = $translatable;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

//    /**
//     * @return bool
//     */
//    public function isTranslatable(): bool
//    {
//        return $this->translatable;
//    }
}