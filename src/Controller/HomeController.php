<?php

namespace App\Controller;

use App\DomainModel\Repository\TargetRepository;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var TargetRepository
     */
    private $targetRepository;

    /**
     * HomeController constructor.
     * @param \Twig_Environment $twig
     * @param TargetRepository $targetRepository
     */
    public function __construct(\Twig_Environment $twig, TargetRepository $targetRepository)
    {
        $this->twig = $twig;
        $this->targetRepository = $targetRepository;
    }

    public function execute()
    {
        return new Response($this->twig->render('home.html.twig'));
    }
}
