<?php

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;

/**
 * Class ViewResponder
 *
 * @package App\UI\Responder
 */
class ViewResponder
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * ViewResponder constructor.
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __invoke(string $template, array $params = [])
    {
        return new Response(
            $this->twig->render($template, $params)
        );
    }
}