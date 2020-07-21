<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Flush\Model;

use AppBundle\Services\Flush\Model\InterfaceFlush as Flush;

use AppBundle\Manager\Postgres;

use Predis\Client;

abstract class AbstractFlush implements Flush
{
    /**
     * @var Postgres
     */
    protected $postgres;

    /**
     * @var Client
     */
    protected $redis;

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
        $this->postgres = new Postgres();
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * получаем массив слов для снатия метрик
     *
     * @return array
     */
    protected function getData()
    {
        return json_decode($this->redis->get('task_'.$this->id), 1);
    }

    /**
     * получаем массив слов для снатия метрик
     *
     * @param array $data
     *
     * @return self
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * connect postgres
    */
    protected function connect()
    {
        try {
            $this->postgres->connect();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
            exit();
        }
    }

    /**
     * close connect postgres
     */
    protected function close()
    {
        try {
            $this->postgres->close();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }

    abstract public function flush();

    /**
     * update status project
     *
     * @param int $status
    */
    public function flushStatus($status)
    {
        $this->connect();

        try {
            $this->postgres
                ->query("
                    UPDATE task SET status={$status} WHERE id={$this->id}
                ");
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }

        $this->close();
    }
}