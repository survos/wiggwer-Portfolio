<?php

namespace App\UI\Action;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\ViewResponder;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;

/**
 * Class MentionAction
 *
 * @package App\UI\Action
 */
#[Route(path: '/mention', name: 'mention', methods: ['GET'])]
class MentionAction
{
    /**
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __invoke(Request $request,ViewResponder $viewResponder) {

        return $viewResponder(
            'mention/mention.html.twig'
        );
    }
}