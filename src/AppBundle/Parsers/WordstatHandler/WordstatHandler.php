<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 19:48
 */

namespace AppBundle\Parsers\WordstatHandler;

use AppBundle\Parsers\Handler\HandlerMainAbstract;

class WordstatHandler extends HandlerMainAbstract
{
    public function __construct($redis, $logFile, $user, $pass)
    {
        parent::__construct($redis, $logFile);
        $this->curl->setHeader([
            'X_API_USER: ' . $user,
            'X_API_PASS: ' . $pass,
        ]);
    }
    
    public function add()
    {
        $words = array_filter($this->final);
        if (count($words) == 0) return [];

        $normalize = $this->normalizeArray($words);
        foreach ($this->data['parse'] as $page => $words) {
            foreach ($words as $key => $item) {
                if (is_array($item)) continue;
                if (!isset($normalize[$item])) continue;

                if (is_string($item)) {
                    $this->data['parse'][$page][$key] = [
                        'phrase' => $item,
                        'ws' => $normalize[$item],
                    ];
                }
            }
        }
        
        $this->redis->set('task_'.$this->id, json_encode($this->data));

        return $this->data;
    }
}