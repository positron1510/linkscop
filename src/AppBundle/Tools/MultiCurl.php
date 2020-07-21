<?php
namespace AppBundle\Tools;

use AppBundle\Tools\Request as CurlRequest;

class MultiCurl
{
    /**
     * @var
    */
    public $headers, $userAgent;
    private $curlOptions, $callback, $requests, $requestsMap, $threads;

    /**
     * Инициалезируем переменные
     *
     * @param int $threads
     */
    public function __construct($threads = 100)
    {
        $this->headers = [];
        
        $this->curlOptions = [
            CURLOPT_AUTOREFERER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 5,
        ];
        
        $this->setUserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0');
        $this->setReferer('http://google.com');

        $this->requests = [];
        $this->requestsMap = [];
        $this->threads = $threads;
    }

    /**
     * Добавляем опции к курлу
     *
     * @param string $option
     * @param boolean|int|array $value
     *
     * @return self
     */
    public function setOption($option, $value)
    {
        $this->curlOptions[$option] = $value;

        return $this;
    }

    /**
     * Удаляем опции курла
     *
     * @param string $option
     *
     * @return self
     */
    public function removeOption($option)
    {
        unset($this->curlOptions[$option]);

        return $this;
    }
    
    /**
     * Добаляем заголовки к курлу
     *
     * @param array $header
     *
     * @return boolean
     */
    public function setHeader($header)
    {
        if(is_array($header) AND count($header))
        {
            $this->curlOptions[CURLOPT_HTTPHEADER] = $header;
            return true;
        }
        
        return false;
    }

    /**
     * Содержит URL источника запроса
     *
     * @param string $referer
     *
     * @return boolean
     */
    public function setReferer($referer)
    {
        $this->curlOptions[CURLOPT_REFERER] = $referer;

        return true;
    }
    
    /**
     * Добавляем заголовки user-agent
     *
     * @param string $userAgent
     *
     * @return boolean
     */
    public function setUserAgent($userAgent)
    {
        $this->curlOptions[CURLOPT_USERAGENT] = $userAgent;

        return true;
    }

    /**
     * Добавляем callback функция для ответов курла
     *
     * @param array $callback
     *
     * @return self
    */
    public function setCallback($callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * Получаем Request для запроса в курле
     *
     * @param CurlRequest $request
     *
     * @return self
    */
    public function setRequest(CurlRequest $request)
    {
        if(!isset($request->curlOptions[CURLOPT_URL]) OR $request->curlOptions[CURLOPT_URL] == '') return false;
        
        if(is_array($request->curlOptions) AND count($request->curlOptions)) {
            $request->curlOptions = $request->curlOptions + $this->curlOptions;
        } else {
            $request->curlOptions = $this->curlOptions;
        }

        $this->requests[] = $request;

        return $this;
    }
    
    /**
     * Запускаем курл
    */
    public function run()
    {
        if(!count($this->requests) OR !is_callable($this->callback)) return false;

        $master = curl_multi_init();
        foreach ($this->requests as $request) {
            usleep(20000);
            $curl = curl_init();
            $this->requests[(int) $curl] = $request;
            curl_setopt_array($curl, $request->curlOptions);
            curl_multi_add_handle($master, $curl);
        }

        do {
            while(($execRun = curl_multi_exec($master, $running)) == CURLM_CALL_MULTI_PERFORM)
                if($execRun != CURLM_OK) break;

            while($done = curl_multi_info_read($master)) {
                $id = (int) $done['handle'];
                $info = curl_getinfo($done['handle']);
                $response = curl_multi_getcontent($done['handle']);
                $url = $this->requests[$id];

                call_user_func($this->callback, $response, $info, $url);
                curl_multi_remove_handle($master, $done['handle']);
                unset($this->requests[$id]);
            }

            //Блокируем и ждём пока ещё один поток не завершится
            if ($running) curl_multi_select($master, 10);
        } while($running);
        
        curl_multi_close($master);
    }
}