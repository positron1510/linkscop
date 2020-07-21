<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30.06.15
 * Time: 12:10
 */
namespace AppBundle\Parsers\Handler;

use AppBundle\Tools\Request;

interface HandlerMainInterface
{
    /**
     * получаем данные по доменну из курла и сохраняем
     *
     * @param string $response Результат ответа от потока в курле
     * @param array $info информация о запросе
     * @param Request $request информация о запросе курла
     */
    public function callback($response, $info, $request);

    /**
     * инициализируем объекты для получения данных
     *
     * @param array $data
     */
    public function process(array $data);

    /**
     * Очищаем массив результатов
     */
    public function clearArray();

    /**
     * запускаем процесс сбора данных
     */
    public function run();

    /**
     * Добавляем исходный массив
     *
     * @param integer $id
     *
     * @return self
     */
    public function setId($id);

    /**
     * Добавляем исходный массив
     *
     * @param array $data
     *
     * @return self
     */
    public function setData(array $data);

    /**
     * Записываем данные в редис
     *
     * @return Request
     */
    public function add();
}