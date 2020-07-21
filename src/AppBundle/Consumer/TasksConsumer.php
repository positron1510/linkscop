<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 03.06.16
 * Time: 13:07
 */

namespace AppBundle\Consumer;

use AppBundle\Services\Parser\Model\InterfaceParser;
use AppBundle\Services\Parser\Wordstat;
use AppBundle\Services\Parser\Top;
use AppBundle\Services\Parser\Majestic;

use Predis\Client;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class TasksConsumer implements ConsumerInterface
{
    /**
     * @var Client
     */
    private $redis;

    /**
     * @var Wordstat
     */
    private $ws;

    /**
     * @var Top
     */
    private $top;

    /**
     * @var Majestic
     */
    private $majestic;

    /**
     * init parameters
     *
     * @param Client $redis
     * @param Wordstat $ws
     * @param Top $top
     * @param Majestic $majestic
    */
    public function __construct(Client $redis, Wordstat $ws, Top $top, Majestic $majestic)
    {
        $this->redis = $redis;

        $this->ws = $ws;
        $this->top = $top;
        $this->majestic = $majestic;
    }

    public function execute(AMQPMessage $msg)
    {
        $parameters = json_decode($msg->body, 1);

        sleep(1);
        echo "Проверяем удалена задача или нет".PHP_EOL;
        if (!$this->redis->get("task_".$parameters['id'])) return true;

        sleep(1);
        echo "Собираем Wordstat: ".$parameters['id'].PHP_EOL;
        $this->runParser($this->ws, $parameters['id']);
        if ($this->ws->isWordstat()) return false;

        sleep(1);
        echo "Собираем топы: ".$parameters['id'].PHP_EOL;
        $this->runParser($this->top, $parameters['id']);

        sleep(1);
        echo "Собираем ссылки: ".$parameters['id'].PHP_EOL;
        $this->runParser($this->majestic, $parameters['id']);

        sleep(1);
        echo "Анализ проект завершен id:".$parameters['id'].PHP_EOL;
        $this->redis->publish("status", "endAnalysis".$parameters['id']);
        $this->redis->del("task_".$parameters['id']);

        return true;
    }

    /**
     * run parser metrics
     *
     * @param string $parser
     * @param int $id
     *
     * @return boolean
     */
    private function runParser($parser, $id)
    {
        /* @var InterfaceParser $parser */
        $parser
            ->setId($id)
            ->pub();

        if ($parser->isMetrics()) {
            $parser->run();
        }

        $parser->flush();
    }
}