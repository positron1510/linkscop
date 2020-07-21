<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 19:48
 */

namespace AppBundle\Parsers\WordstatHandler\Callback;

use AppBundle\Parsers\Handler\HandleAbstract;
use AppBundle\Tools\Request;

class WordstatCallback extends HandleAbstract
{
    /**
     * @var string
     */
    public $phrase;

    public function getRequest()
    {
        // TODO: Implement getRequest() method.
        return new Request('http://robots.element.ru:8888/ws/?accurate=1&phrases='.rawurlencode($this->phrase));
    }

    public function run()
    {
        // TODO: Implement run() method.
        $data = json_decode($this->response['0'], 1);
        
        if(isset($data[0]['shows'])) {
            return [
                $this->phrase => $data[0]['shows'],
            ];
        }

        return null;
    }
}