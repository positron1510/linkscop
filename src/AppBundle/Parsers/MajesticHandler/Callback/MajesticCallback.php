<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 19:48
 */

namespace AppBundle\Parsers\MajesticHandler\Callback;

use AppBundle\Services\WwwUrl;
use AppBundle\Parsers\Handler\HandleAbstract;
use AppBundle\Tools\Request;

class MajesticCallback extends HandleAbstract
{
    /**
     * @var array
     */
    public $data;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $apiKey;

    public function getRequest()
    {
        // TODO: Implement getRequest() method.
        $request = function ($domain) {
            return new Request("https://api.majestic.com/api/xml?".
                http_build_query([
                    'app_api_key' => $this->apiKey,
                    'cmd' => 'GetIndexItemInfo',
                    'items' => '1',
                    'item0' => $domain,
                    'datasource' => 'fresh',
                ])
            );
        };

        if (preg_match("/www\./i", $this->domain)) {
            $domain = str_replace("www.", "", $this->domain);
        } else {
            $url = new WwwUrl();
            $domain = $url->getUrl($this->domain);
        }

        return [
            $request($domain),
            $request($this->domain),
        ];
    }

    /**
     * Read answer majestic
     *
     * @param object $data
     *
     * @return array
    */
    private function getMetrics($data)
    {
        if (property_exists($data, "DataTables")) {
            $name = $data->DataTables->DataTable->attributes();

            $name = explode("|", (string)$name["Headers"]);
            $value = explode("|", (string)$data->DataTables->DataTable->Row);

            $result = [];
            foreach ($name as $key => $item) {
                $result[$item] = $value[$key];
            }

            if ($result['Status'] == 'MayExist') {
                return [
                    'domains' => 0,
                    'hrefs' => 0,
                    'isWWW' => false,
                ];
            } else {
                $isWww = false;
                if ($result['RefDomains'] > 0 && $result['ExtBackLinks'] > 0) {
                    if (preg_match("/www\./i", $result["Item"])) $isWww = true;
                }

                return [
                    'domains' => !$result['RefDomains'] ? 0 : $result['RefDomains'],
                    'hrefs' => !$result['ExtBackLinks'] ? 0 : $result['ExtBackLinks'],
                    'isWWW' => $isWww,
                ];
            }
        }

        return null;
    }

    public function run()
    {
        // TODO: Implement run() method.
        $this->data[] = simplexml_load_string($this->response[0]);

        if (count($this->data) == 2) {
            $data = $this->getMetrics($this->data[0]);
            $dataWWW = $this->getMetrics($this->data[1]);

            if (!$data && !$dataWWW) {
                return [
                    $this->domain =>
                        [
                            'domains' => 0,
                            'hrefs' => 0,
                            'isWWW' => false,
                        ]
                ];
            }

            return [
                $this->domain =>
                    [
                        'domains' => $data['domains'] + $dataWWW['domains'],
                        'hrefs' => $data['hrefs'] + $dataWWW['hrefs'],
                        'isWWW' => $data['isWWW'] || $dataWWW['isWWW'] ? true : false,
                    ]
            ];
        } else {
            return null;
        }
    }
}