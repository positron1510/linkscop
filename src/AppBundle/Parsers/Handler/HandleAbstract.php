<?php
namespace AppBundle\Parsers\Handler;

use AppBundle\Tools\Request;
use AppBundle\Parsers\Handler\HandleInterface as MetricsInterface;

abstract class HandleAbstract implements MetricsInterface
{
    /**
     * @var array
     */
    protected $response;

    abstract public function getRequest();

    public function setResponse($content, $info, $request)
    {
        $this->response = [$content, $info, $request];
    }
    
    abstract public function run();
}