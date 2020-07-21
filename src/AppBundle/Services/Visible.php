<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 15.06.16
 * Time: 18:08
 */

namespace AppBundle\Services;


class Visible
{
    /**
     * @var integer
    */
    private $wsSum;

    /**
     * Считаем сумму всей частотки
     *
     * @param array $data
     *
     * @return integer
    */
    public function considerWsSum(array $data)
    {
        $sum = 0;
        foreach ($data as $item) $sum += $item['ws'];

        $this->wsSum = $sum == 0 ? 1 : $sum;
    }

    /**
     * Возвращаем видимость для домена
     *
     * @param float $k
     *
     * @return float
    */
    public function get($k)
    {
        return $this->wsSum * $k / $this->wsSum;
    }
}