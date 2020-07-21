<?php
namespace AppBundle\Parsers\Handler;

use AppBundle\Tools\Request;

interface HandleInterface
{
    /**
     * Генерируем Url для запроса в курле
     *
     * @return Request
     */
    public function getRequest();

    /**
     * Ответ от курла
     *
     * @param string $content
     * @param array $info
     * @param array $request
     */
    public function setResponse($content, $info, $request);

    /**
     * Обрабатываем ответ от курла
     */
    public function run();
}
