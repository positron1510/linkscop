<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 21.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Parser\Model;


interface InterfaceParser
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
     * Проверяем необходимость сбора метрик
     *
     * @return boolean
     */
    public function isMetrics();

    /**
     * собираем metrics по запросам
     *
     * @return self
     */
    public function run();

    /**
     * Publish status message project
     *
     * @return self
     */
    public function pub();

    /**
     * Добавляем данные в базу
     *
     * @return self
     */
    public function flush();
}