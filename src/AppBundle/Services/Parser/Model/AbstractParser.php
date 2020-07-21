<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Parser\Model;

use AppBundle\Entity\Task;
use AppBundle\Parsers\Handler\HandlerMainInterface;
use AppBundle\Services\Parser\Model\InterfaceParser as Parser;

use Predis\Client;

abstract class AbstractParser implements Parser
{
    /**
     * @var Client
     */
    protected $redis;

    /**
     * @var Task
     */
    protected $task;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var integer
     */
    protected $id;

    /**
     * init variable
     *
     * @param Client $redis
     */
    public function __construct(Client $redis)
    {
        $this->redis = $redis;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    protected function getData()
    {
        $this->data = json_decode($this->redis->get('task_'.$this->id), 1);

        return $this->data;
    }

    /**
     * Создаем массив для запросов
     *
     * @return array
     */
    abstract protected function getArray();

    /**
     * run parser metrics
     *
     * @param HandlerMainInterface $main
    */
    protected function parser(HandlerMainInterface $main)
    {
        $queries = array_chunk($this->getArray(), 100);

        $main
            ->setId($this->id)
            ->setData($this->data);

        foreach ($queries as $item) {
            $main->process($item);
            $main->run();
            $main->add();

            $main->clearArray();

            sleep(1);
        }
    }

    abstract public function run();

    abstract public function pub();

    abstract public function flush();
}