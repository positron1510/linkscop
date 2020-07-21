<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:32
 */

namespace AppBundle\Services\Parser;

use AppBundle\Parsers\WordstatHandler\Callback\WordstatCallback;
use AppBundle\Parsers\WordstatHandler\WordstatHandler;

use AppBundle\Services\Parser\Model\AbstractParserApinator;
use AppBundle\Services\Flush\Wordstat as Flush;

class Wordstat extends AbstractParserApinator
{
    public function isMetrics()
    {
        // TODO: Implement isMetrics() method.
        $data = $this->getData();
        foreach ($data['parse'] as $item) {
            foreach ($item as $word) {
                if (is_string($word)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Проверяем наличее вордстата
    */
    public function isWordstat()
    {
        if ($this->isMetrics()) {
            sleep(30);
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
                if (is_string($item)) {
                    $object = new WordstatCallback();
                    $object->phrase = $item;

                    $queries[] = $object;
                }
            }
        }

        return $queries;
    }

    public function pub()
    {
        $this->redis->publish("status", "wordstat".$this->id);
        

        return $this;
    }

    public function run()
    {
        $ws = new WordstatHandler($this->redis, "/tmp/ParseTop.log", $this->user, $this->pass);
        $this->parser($ws);

        return $this;
    }

    public function flush()
    {
        if ($this->isMetrics()) return $this;

        $ws = new Flush($this->redis);
        $ws
            ->setId($this->id)
            ->flush();

        $ws->flushStatus(1);

        return $this;
    }
}