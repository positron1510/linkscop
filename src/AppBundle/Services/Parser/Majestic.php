<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:32
 */

namespace AppBundle\Services\Parser;

use AppBundle\Parsers\MajesticHandler\Callback\MajesticCallback;
use AppBundle\Parsers\MajesticHandler\MajesticHandler;

use AppBundle\Services\Parser\Model\AbstractParser;

use Predis\Client;

class Majestic extends AbstractParser
{
    /**
     * @var string
     */
    private $token;

    /**
     * init variable
     *
     * @param Client $redis
     * @param string $token
    */
    public function __construct($redis, $token)
    {
        parent::__construct($redis);

        $this->token = $token;
    }

    public function isMetrics()
    {
        // TODO: Implement isMetrics() method.
        $data = $this->getData();
        foreach ($data['topDomains'] as $items) {
            foreach ($items as $item) {
                if (!isset($item['domains'])) {
                    return true;
                }
            }
        }

        return false;
    }
    
    protected function getArray()
    {
        $queries = [];
        $data = $this->getData();

        foreach ($data['topDomains'] as $self_url=>$items) {
            $urls = array_keys($items);
            if (!in_array($self_url, $urls) && !in_array($self_url . '/', $urls)) {
                $self_url = rtrim($self_url, '/');
                $data['topDomains'][$self_url][$self_url] = ['domain'=>$self_url, 'visible'=>0.0];
            }
            if (in_array($self_url, $urls) && in_array($self_url . '/', $urls)) {
                $with_slash = $data['topDomains'][$self_url][$self_url.'/'];
                $without_slash = $data['topDomains'][$self_url][$self_url];
                if ($without_slash['visible'] >= $with_slash['visible']) {
                    unset($data['topDomains'][$self_url][$self_url.'/']);
                }else {
                    unset($data['topDomains'][$self_url][$self_url]);
                }
            }
        }

        $this->redis->set('task_'.$this->id, json_encode($data));

        foreach ($data['topDomains'] as $items) {
            foreach ($items as $item) {
                if (!isset($item['domains'])) {
                    $object = new MajesticCallback();
                    $object->domain = $item['domain'];
                    $object->apiKey = $this->token;

                    $queries[] = $object;
                }
            }
        }

        return $queries;
    }

    public function pub()
    {
        $this->redis->publish("status", "parserTop".$this->id);

        return $this;
    }

    public function run()
    {
        $majestic = new MajesticHandler($this->redis, "/tmp/ParseTop.log");
        $this->parser($majestic);
        $majestic->flush();

        return $this;
    }

    public function flush()
    {
        return $this;
    }
}