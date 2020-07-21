<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 19:48
 */

namespace AppBundle\Parsers\TopHandler;

use AppBundle\Parsers\Handler\HandlerMainAbstract;

class TopHandler extends HandlerMainAbstract
{
    /**
     * @var array
     */
    private $k = [
        1 => 1,
        2 => 0.6,
        3 => 0.4,
        4 => 0.3,
        5 => 0.3,
        6 => 0.2,
        7 => 0.2,
        8 => 0.1,
        9 => 0.1,
        10 => 0.1,
    ];

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
        $tops = array_filter($this->final);
        if (count($tops) == 0) return [];

        $normalize = $this->normalizeArray($tops);

        foreach ($this->data['parse'] as $key => $data) {
            $hrefs = [];
            $words = [];

            foreach ($data as $item) {
                foreach ($normalize[$item['phrase']] as $href) {
                    $hrefs[$href['domain']][$item['phrase']] = $href['position'];
                }

                $words[$item['phrase']] = $item['ws'];
            }

            $words['sumWs'] = array_sum($words);

            $domains = [];
            foreach ($hrefs as $href => $items) {
                $aK = [];
                foreach ($items as $word => $item) {
                    $ws = $words[$word] == 0 ? 1 : $words[$word];
                    $aK[] = $ws * $this->k[$item];
                }

                $sumWs = $words['sumWs'] == 0 ? 1 : $words['sumWs'];
                $domains[$href] = [
                    'domain' => $href,
                    'visible' => array_sum($aK) / $sumWs,
                ];
            }

            uasort($domains, function ($a, $b) {
                return $a['visible'] < $b['visible'];
            });

            $this->data['topDomains'][$key] = array_slice($domains, 0, 10);

            if (!isset($domains[$key])) {
                $this->data['topDomains'][$key][$key] = [
                    'domain' => $key,
                    'visible' => 0,
                ];
            }
        }

        $this->redis->set('task_'.$this->id, json_encode($this->data));

        return $this->data;
    }
}