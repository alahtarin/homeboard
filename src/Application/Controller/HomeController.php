<?php

namespace App\Application\Controller;

use App\BusinessLogic\RequestProccessor\Home\HomeRequestInput;
use App\BusinessLogic\RequestProccessor\Home\HomeRequestProcessor;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @var HomeRequestProcessor
     */
    private $homeRequestProcessor;

    public function __construct(HomeRequestProcessor $homeRequestProcessor)
    {
        $this->homeRequestProcessor = $homeRequestProcessor;
    }

    public function execute()
    {
        $output = $this->homeRequestProcessor->process(new HomeRequestInput());

        return new Response($output->getHtml());
    }
}
