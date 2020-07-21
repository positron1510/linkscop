<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Parser\Model;

use AppBundle\Services\Parser\Model\AbstractParser as Parser;

use Predis\Client;

abstract class AbstractParserApinator extends Parser
{
    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $pass;

    /**
     * init variable
     *
     * @param Client $redis
     * @param string $user
     * @param string $pass
     */
    public function __construct($redis, $user, $pass)
    {
        parent::__construct($redis);

        $this->user = $user;
        $this->pass = $pass;
    }
}