<?php

namespace App\UI\Action;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\ViewResponder;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;

/**
 * Class HomeAction
 *
 * @package App\UI\Action
 *
 * @Route("/", name="home")
 */
class HomeAction
{
    /**
     * @param Request $request
     * @param ViewResponder $viewResponder
     *
     * @return mixed
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __invoke(Request $request, ViewResponder $viewResponder)
    {
        return $viewResponder(
           'home/home.html.twig'
        );
    }
}