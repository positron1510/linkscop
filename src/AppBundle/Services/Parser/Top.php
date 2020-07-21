<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:32
 */

namespace AppBundle\Services\Parser;

use AppBundle\Services\Flush\Domain as Flush;
use AppBundle\Parsers\TopHandler\Callback\TopCallback;
use AppBundle\Parsers\TopHandler\TopHandler;

use AppBundle\Services\Parser\Model\AbstractParserApinator;

class Top extends AbstractParserApinator
{
    public function isMetrics()
    {
        // TODO: Implement isMetrics() method.
        $data = $this->getData();
        if (!isset($data["topDomains"])) {
            return true;
        }

        return false;
    }

    /**
     * Создаем массив для запросов
     *
     * @return array
    */
    protected function getArray()
    {
        $queries = [];
        $data = $this->getData();

        foreach ($data['parse'] as $items) {
            foreach ($items as $item) {
                $object = new TopCallback();
                try{
                    $object->phrase = $item['phrase'];
                }catch (\ErrorException $ex) {
                    $object->phrase = $item;
                }
                $object->region = $this->data['region'];
                $object->top = $this->data['top'];

                $queries[] = $object;
            }
        }

        return $queries;
    }

    public function pub()
    {
        $this->redis->publish("status", "topDomain".$this->id);

        return $this;
    }

    public function run()
    {
        $top = new TopHandler($this->redis, "/tmp/ParseTop.log", $this->user, $this->pass);
        $top->process($this->getArray());
        $top->run();

        $top
            ->setId($this->id)
            ->setData($this->data)
            ->add();

        $top->clearArray();

        return $this;
    }

    public function flush()
    {
        $flush = new Flush($this->redis);
        $flush->setId($this->id);
        $flush->flushStatus(2);

        return $this;
    }
}