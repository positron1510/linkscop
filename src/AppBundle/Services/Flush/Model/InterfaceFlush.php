<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Flush\Model;


interface InterfaceFlush
{
    /**
     * получаем ID проекта
     *
     * @param int $id
     *
     * @return self
     */
    public function setId($id);

    /**
     * собираем вордстат по запросам
     *
     * @return self
     */
    public function flush();
}