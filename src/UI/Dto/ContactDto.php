<?php

namespace App\UI\Dto;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 */
class ContactDto
{
     /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="name.required"
     * )
     */
    protected $name;

    /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="email.required"
     * )
     * @Assert\Email(
     *     message="email.format_invalid"
     * )
     */
    protected $email;

    /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="subject.required"
     * )
     */
    protected $subject;

    /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="message.required"
     * )
     */
    protected $message;

    /**
     * ContactDTO constructor.
     *
     * @param string|null $name
     * @param string|null $email
     * @param string|null $subject
     * @param string|null $message
     */
    public function __construct(
        ?string $name,
        ?string $email,
        ?string $subject,
        ?string $message
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
}