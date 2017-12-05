<?php

namespace App\BusinessLogic\RequestProccessor\SaveTarget;

use App\DomainModel\Entity\Target;
use App\DomainModel\Repository\TargetRepository;

class SaveTargetProcessor
{
    /**
     * @var TargetRepository
     */
    private $targetRepository;

    public function __construct(TargetRepository $targetRepository)
    {
        $this->targetRepository = $targetRepository;
    }

    public function process(SaveTargetInput $input)
    {
        $target = (new Target())
            ->setDate(new \DateTime())
            ->setType($input->getType())
        ;

        $this->targetRepository->save($target);
    }
}
