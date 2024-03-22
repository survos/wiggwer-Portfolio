<?php

namespace App\Controller;

use App\UI\Form\ContactType;
use App\UI\Responder\RedirectResponder;
use App\UI\Responder\ViewResponder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(
        Request $request,
        ViewResponder $viewResponder,
        RedirectResponder $redirectResponder
    ) {
        $form = $this->createForm(ContactType::class);
//        $form = $this->formFactory->create(ContactType::class)
//            ->handleRequest($request);
//
//        if ($this->contactHandler->handle($form)) {
//            return $redirectResponder('home');
//        }

        return $viewResponder(
            'home/home.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

}
