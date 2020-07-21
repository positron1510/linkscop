<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 19:48
 */

namespace AppBundle\Parsers\TopHandler\Callback;

use AppBundle\Parsers\Handler\HandleAbstract;
use AppBundle\Tools\Request;

class TopCallback extends HandleAbstract
{
    /**
     * @var string
     */
    public $phrase;

    /**
     * @var integer
     */
    public $region;

    /**
     * @var integer
     */
    public $top;

    public function getRequest()
    {
        // TODO: Implement getRequest() method.
        return new Request("http://robots.element.ru:8888/yatop/?".
            http_build_query([
                "phrases" => $this->phrase,
                "region" => $this->region,
                "one" => 1,
            ])
        );

        /*return new Request("http://xmlproxy.ru/search/xml?".
            http_build_query([
                "user" => "tech@optimism.ru",
                "key" => "3eb9a1f5441736cec872ca63c912ed8b",
                "query" => $this->phrase,
                "groupby" => rawurlencode('attr=d.mode=flat.groups-on-page=10.docs-in-group=1'),
                "lr" => $this->region,
            ])
        );*/
    }

    public function run()
    {
        $data = json_decode($this->response['0'], 1);

        if (count($data) > 1) {
            $domains = [];
            foreach ($data as $item) {
                if (!isset($item['position'])) continue;

                if ($item['position'] <= $this->top) {
                    $domains[] = [
                        'domain' => $item['url'],
                        'position' => $item['position'],
                    ];
                }
            }


            return [
                $this->phrase => $domains
            ];
        }

        return [
            $this->phrase => []
        ];
    }

    /*public function run()
    {
        $sxml = simplexml_load_string($this->response['0']);

        try {
            $data = $sxml->response->results->grouping->group;
            $domains = [];
            $position = 1;
            foreach ($data as $item) {
                $domains[] = [
                    'domain' => (string)$item->doc->url,
                    'position' => $position,
                ];
                $position++;
            }

            return [
                $this->phrase => $domains
            ];
        }catch (\ErrorException $ex){}

        return [
            $this->phrase => []
        ];
    }*/
}