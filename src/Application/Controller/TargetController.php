<?php

namespace App\Application\Controller;

use App\BusinessLogic\RequestProccessor\SaveTarget\SaveTargetInput;
use App\BusinessLogic\RequestProccessor\SaveTarget\SaveTargetProcessor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TargetController
{
    /**
     * @var SaveTargetProcessor
     */
    private $saveRequestProcessor;

    public function __construct(SaveTargetProcessor $saveRequestProcessor)
    {
        $this->saveRequestProcessor = $saveRequestProcessor;
    }

    public function complete(Request $request)
    {
        $target = $request->request->get('target');
        $this->saveRequestProcessor->process(new SaveTargetInput($target));

        return new Response(null, Response::HTTP_CREATED);
    }
}
