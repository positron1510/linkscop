<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 19:48
 */

namespace AppBundle\Parsers\MajesticHandler;

use AppBundle\Parsers\Handler\HandlerMainAbstract;
use AppBundle\Services\Flush\Domain;

class MajesticHandler extends HandlerMainAbstract
{
    public function add()
    {
        $domains = array_filter($this->final);
        if (count($domains) == 0) return [];

        $normalize = $this->normalizeArray($domains);
        foreach ($this->data['topDomains'] as $page => $domains) {
            foreach ($domains as $key => $domain) {
                if (!isset($normalize[$domain['domain']])) continue;

                $value = $normalize[$domain['domain']];
                $data = [
                    'domain' => $domain['domain'],
                    'visible' => $domain['visible'],
                    'domains' => $value['domains'],
                    'hrefs' => $value['hrefs'],
                    'isWWW' => $value['isWWW'],
                ];

                $this->data['topDomains'][$page][$domain['domain']] = $data;
            }
        }

        return $this->data;
    }

    /**
     * Сохраняем полученные значения в redis
     *
     * @return self
    */
    public function flush()
    {
        $flush = new Domain($this->redis);
        $flush
            ->setId($this->id)
            ->setData($this->data)
            ->flush();

        $flush->flushStatus(3);
        $flush->flushStatus(4);

        return $this;
    }
}