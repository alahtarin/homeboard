<?php

namespace App\BusinessLogic\RequestProccessor\Home;

use App\DomainModel\Entity\Target;
use App\DomainModel\Repository\TargetRepository;

class HomeRequestProcessor
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var TargetRepository
     */
    private $targetRepository;

    public function __construct(\Twig_Environment $twig, TargetRepository $targetRepository)
    {
        $this->twig = $twig;
        $this->targetRepository = $targetRepository;
    }

    public function process(HomeRequestInput $input)
    {
        $targets = array_combine(Target::TYPES, array_map(function($name) {
            return ['completed' => false, 'name' => $name];
        }, Target::NAMES));

        foreach ($this->targetRepository->findForToday() as $completedTarget) {
            $targets[$completedTarget->getType()]['completed'] = true;
        };

        return new HomeRequestOutput($this->twig->render('home.html.twig', [
            'targets' => $targets,
        ]));
    }
}
