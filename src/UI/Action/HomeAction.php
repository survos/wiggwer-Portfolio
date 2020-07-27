<?php

namespace App\UI\Action;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\RedirectResponder;
use App\UI\Responder\ViewResponder;
use App\UI\Handler\ContactHandler;
use App\UI\Form\ContactType;
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
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
    *  @var ContactHandler
    */
    protected $contactHandler;

    /**
     * Home constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param FormHandler          $formHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ContactHandler $contactHandler
    ) {
        $this->formFactory = $formFactory;
        $this->contactHandler = $contactHandler;
    }


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
    public function __invoke(
        Request $request,
        ViewResponder $viewResponder,
        RedirectResponder $redirectResponder
    ) {
        $form = $this->formFactory->create(ContactType::class)
        ->handleRequest($request);

        if ($this->contactHandler->handle($form)) {
            return $redirectResponder('home');
        }

        return $viewResponder(
            'home/home.html.twig',
            [
              'form' => $form->createView(),
           ]
        );
    }
}
