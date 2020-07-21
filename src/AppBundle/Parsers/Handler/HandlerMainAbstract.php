<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30.06.15
 * Time: 12:09
 */

namespace AppBundle\Parsers\Handler;

use AppBundle\Tools\MultiCurl;
use AppBundle\Parsers\Handler\HandlerMainInterface as CurlInterface;
use AppBundle\Tools\Request;

use Predis\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

abstract class HandlerMainAbstract implements CurlInterface
{
    /**
     * @var Client
     */
    protected $redis;

    /**
     * @var MultiCurl
    */
    protected $curl;

    /**
     * @var Logger
    */
    private $log;

    /**
     * @var array
     */
    protected $handlerInit;

    /**
     * @var array
    */
    protected $final;

    /**
     * @var int
     */
    protected $domain;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var integer
     */
    protected $id;

    /**
     * Инициалезируем переменные
     *
     * @param Client $redis
     * @param string $logFile получаем ссылку на Log file
    */
    public function __construct(Client $redis, $logFile)
    {
        $this->redis = $redis;

        $this->curl = new MultiCurl();
        $this->curl->setOption(CURLOPT_TIMEOUT, 120);
        $this->curl->setOption(CURLOPT_CONNECTTIMEOUT, 0);
        $this->curl->setCallback([$this, 'callback']);
        $this->curl->setOption(
            CURLOPT_USERAGENT,
            "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7"
        );

        $this->log = new Logger("Audit");
        $this->log->pushHandler(new StreamHandler($logFile, Logger::WARNING));
    }

    /**
     * получаем данные по доменну из курла и сохраняем
     *
     * @param string $response Результат ответа от потока в курле
     * @param array $info информация о запросе
     * @param Request $request информация о запросе курла
     */
    public function callback($response, $info, $request)
    {
        $this->logger($response, $info);
        $this->logger('===========');

        if (isset($this->handlerInit[spl_object_hash($request)])) {
            $this->handlerInit[spl_object_hash($request)]->setResponse($response, $info, $request);
            $this->final[] = $this->handlerInit[spl_object_hash($request)]->run();
        }
    }

    /**
     * инициализируем объекты для получения данных
     *
     * @param array $data
     */
    public function process(array $data)
    {
        foreach ($data as $object) {
            $request = $object->getRequest();

            if (is_array($request)) {
                foreach ($request as $urls) {
                    $this->addRequest($urls, $object);
                }
            } else {
                $this->addRequest($request, $object);
            }
        }
    }

    /**
     * Очищаем массив результатов
     *
     * @return self
     */
    public function clearArray()
    {
        unset($this->handlerInit, $this->final);

        $this->handlerInit = [];
        $this->final = [];
    }

    /**
     * Добавляем урлы в курл и массив callback
     *
     * @param Request $request
     * @param object $object
    */
    private function addRequest(Request $request, $object)
    {
        $this->handlerInit[spl_object_hash($request)] = $object;
        $this->curl->setRequest($request);
    }

    /**
     * запускаем процесс сбора данных
     */
    public function run()
    {
        $this->curl->run();
    }

    private function logger($message, $data = [])
    {
        $this->log->addError($message, $data);
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Приводим массив к нормальному виду
     *
     * @param array $data
     *
     * @return array
    */
    protected function normalizeArray(array $data)
    {
        $mergeArray = [];
        foreach ($data as $item) $mergeArray = array_merge($mergeArray, $item);

        return $mergeArray;
    }
    
    abstract public function add();
}