<?php

namespace App\UI\Responder;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RedirectResponder
 */
class RedirectResponder
{
    /** 
     * @var UrlGeneratorInterface 
     */
    protected $urlGenerator;

    /**
     * RedirectResponder constructor.
     */
    public function __construct(
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Undocumented function
     *
     *
     * @return void
     */
    public function __invoke(
        string $routeName,
        array $paramsRoute = []
    ) {
        return new RedirectResponse(
            $this->urlGenerator->generate($routeName, $paramsRoute)
        );
    }
}