<?php

namespace App\BusinessLogic\RequestProccessor\Home;

class HomeRequestOutput
{
    /**
     * @var string
     */
    private $html;

    public function __construct($html)
    {
        $this->html = $html;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }
}
