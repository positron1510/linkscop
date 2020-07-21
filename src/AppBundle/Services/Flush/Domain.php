<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 16.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Flush;

use AppBundle\Entity\Page;
use AppBundle\Entity\Domain as EntityDomain;
use AppBundle\Entity\TopDomains;

use AppBundle\Services\Flush\Model\AbstractFlush;

class Domain extends AbstractFlush
{
    /**
     * @param array $data
     * @param string $page
     * @return array
     *
     */
    private function addDomain(array $data, string $page)
    {
        $domains = [];
        $new_domains = [];
        $domainsValues = [];

        foreach ($data as $item) {
            $domains[] = $item['domain'];
            $new_domains[] = ['domain'=>$item['domain'], 'visible'=>$item['visible']];
            $domainsValues[$item['domain']] = $item;
        }

        $entityDomains = $this->findByInDomain($domains);
        $domainEntity = array_map(function ($data) { return $data['domain']; }, $entityDomains);
        $addDomains = array_diff($domains, $domainEntity);

        if (count($addDomains) > 0) {
            $addDomains = array_unique($addDomains);
            $this->flushDomain($addDomains, $domainsValues);
        }

        $this->updateDomain($domainEntity, $domainsValues);
        $this->taskDomain($new_domains, $page);

        return $domainsValues;
    }

    private function taskDomain(array $domains, string $page)
    {
        foreach ($domains as $item) {
            $sql = "SELECT * FROM task_domain({$this->id}, '{$item['domain']}', '{$item['visible']}', '{$page}')";

            try {
                $this->connect();
                $this->postgres->query($sql);
                $this->close();
            } catch (\Exception $e) {
                echo $e->getMessage().PHP_EOL;
            }
        }
    }

    /**
     * add top domain
     *
     * @param string $page
     * @param array $data
     *
     * @return array
     */
    private function addTopDomains($page, array $data)
    {
        $data = $this->addDomain($data, $page);
        /*$topDomains = $this->findByInTopDomains($page, array_keys($data));

        if (count($topDomains) > 0) {
            $this->flushTopDomain($topDomains, $data, $page);
        }*/
    }

    public function flush()
    {
        $pages = array_keys($this->data['topDomains']);
        foreach ($pages as $page) {
            $this->addTopDomains($page, $this->data['topDomains'][$page]);
        }
    }

    /**
     * find by domain
     *
     * @param array $domain
     *
     * @return array
     */
    private function findByInDomain(array $domain)
    {
        try {
            $this->connect();

            $domain = implode(", ", array_map(function ($data) {
                return "'".$data."'";
            }, $domain));

            $result = $this->postgres
                ->query("
                    SELECT d.id, d.domain FROM domain d WHERE d.domain IN ({$domain}) 
                ")
                ->getResult();

            $this->close();

            return $result;
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
            return [];
        }
    }

    /**
     * add domain
     *
     * @param array $data
     * @param array $domains
     */
    private function flushDomain(array $data, array $domains)
    {
        $sql = "INSERT INTO domain (id, domain, domains, hrefs, is_www) VALUES ";

        $count = count($data);
        $numeric = 0;
        foreach ($data as $domain) {
            $domain = $domains[$domain];
            $isWww = $domain['isWWW'] ? "TRUE" : "FALSE";

            $sql .= "(nextval('domain_id_seq'), ";
            $sql .= "'".$domain['domain']."', ";
            $sql .= $domain['domains'].", ";
            $sql .= $domain['hrefs'].", ";
            $sql .= $isWww.") ";

            if ($numeric != $count -1)
                $sql .= ",";

            $numeric++;
        }

        try {
            $this->connect();
            $this->postgres->query($sql);
            $this->close();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }

    /**
     * add domain
     *
     * @param array $data
     * @param array $domains
     */
    private function updateDomain(array $data, array $domains)
    {
        $this->connect();
        $this->postgres->transactionStart();

        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $domain = $domains[$data[$i]];
            if (!isset($domain['isWWW'])) continue;
            $isWww = $domain['isWWW'] ? "TRUE" : "FALSE";

            $sql = "UPDATE domain SET domains='{$domain['domains']}', hrefs='{$domain['hrefs']}', is_www={$isWww} WHERE domain='{$domain['domain']}'";
            try {
                $this->postgres->query($sql);
            } catch (\Exception $e) {
                echo $e->getMessage().PHP_EOL;
            }
        }

        $this->postgres->transactionEnd();
        $this->close();
    }

    /**
     * find by top domains
     *
     * @param string $page
     * @param array $domains
     *
     * @return array
    */
    private function findByInTopDomains($page, array $domains)
    {
        try {
            $this->connect();
            $domains = implode(", ", array_map(function ($data) {
                return "'".$data."'";
            }, $domains));

            $result = $this->postgres
                ->query("
                    SELECT 
                      d.id, d.domain
                    FROM domain d 
                    WHERE 
                      d.domain IN ({$domains})
                      AND d.id NOT IN (
                        SELECT 
                          d.id
                        FROM top_domains td
                          LEFT JOIN page p ON p.id = td.page_id
                          LEFT JOIN domain d ON d.id = td.domain_id
                        WHERE 
                          p.page = '{$page}' 
                          AND d.domain IN ({$domains})
                      )
                ")
                ->getResult();

            $this->close();

            return $result;
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }

    /**
     * add top domain
     *
     * @param array $data
     * @param array $domains
     * @param string $page
     */
    private function flushTopDomain(array $data, array $domains, $page)
    {
        try {
            $this->connect();
            $this->postgres->transactionStart();

            $count = count($data);
            for ($i = 0; $i < $count; $i++) {
                $domain = $domains[$data[$i]['domain']];

                $this->postgres
                    ->query("
                        INSERT INTO top_domains (
                          id, 
                          domain_id, 
                          page_id, 
                          visible
                        ) VALUES (
                          nextval('top_domains_id_seq'),
                          {$data[$i]['id']},
                          (SELECT id FROM page WHERE task_id={$this->id} AND page='{$page}'),
                          {$domain['visible']}
                        )
                    ");
            }

            $this->postgres->transactionEnd();
            $this->close();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }
}