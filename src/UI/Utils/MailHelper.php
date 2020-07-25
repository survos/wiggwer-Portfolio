<?php

namespace App\UI\Utils;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

/**
 * Class MailHelper
 */
class MailHelper
{
    /** 
     * @var MailerInterface
     */
    protected $mailer;

    /** 
     * @var Environment 
     */
    protected $templating;

    /**
     * MailHelper constructor.
     *
     * @param MailerInterface $mailer
     * @param Environment  $templating
     */
    public function __construct(
        MailerInterface $mailer,
        Environment $templating
    ) {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * Undocumented function
     *
     * @param array $from
     * @param array $to
     * @param string $subject
     * @param string $template
     * @param array $paramsTemplate
     * 
     * @return void
     * 
     */
    public function send(
        array $from,
        array $to,
        string $subject,
        string $template,
        array $paramsTemplate = []
    ) {
        $message = new Email();
        $message
            ->Subject($subject)
            ->From($from['email'], $from['name'])
            ->To($to['email'], $to['name'])
            ->html(
                $this->templating->render($template, $paramsTemplate),
                'text/html'
            );

        $this->mailer->send($message);
    }
}