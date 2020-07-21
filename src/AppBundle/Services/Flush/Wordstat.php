<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 16.06.16
 * Time: 13:45
 */

namespace AppBundle\Services\Flush;

use AppBundle\Entity\Page;
use AppBundle\Entity\Phrase;
use AppBundle\Entity\Task;

use AppBundle\Services\Flush\Model\AbstractFlush;

class Wordstat extends AbstractFlush
{
    /**
     * add page task
     *
     * @param array $data
     *
     * @return array
    */
    private function addPage(array $data)
    {
        $pageEntity = $this->findByInPage($data);
        $pages = array_map(function ($data) {return $data['page'];}, $pageEntity);
        $addPage = array_diff($data, $pages);

        if (count($addPage) > 0) {
            $this->flushPage(array_values($addPage));
        }

        return $this->findByInPage($data);
    }

    /**
     * add words
     *
     * @param array $data
    */
    private function addPhrase(array $data)
    {
        $phrases = [];
        $phraseWs = [];
        foreach ($data as $item) {
            $phrases[] = $item['phrase'];
            $phraseWs[$item['phrase']] = $item['ws'];
        }

        $phraseEntity = $this->findByInPhrase($phrases);
        $phraseEntity = array_map(function ($data) { return $data['phrase']; }, $phraseEntity);
        $addPhrase = array_diff($phrases, $phraseEntity);

        if (count($addPhrase) > 0) {
            $this->flushPhrase(array_values($addPhrase), $phraseWs);
        }
    }

    /**
     * add page task
     *
     * @param int $page
     * @param array $phrases
     */
    private function addPagePhrase($page, array $phrases)
    {
        $pagePhrase = $this->findByInPagePhrase($page, $phrases);
        if (count($pagePhrase) > 0) {
            $this->flushPagePhrase($page, $pagePhrase);
        }
    }

    public function flush()
    {
        $this->connect();
        $data = $this->getData();

        $pages = array_keys($data['parse']);
        $pages = $this->addPage($pages);
        foreach ($pages as $page) {
            $this->addPhrase($data['parse'][$page['page']]);
            $this->addPagePhrase($page['id'], $data['parse'][$page['page']]);
        }

        $this->close();
    }

    /**
     * find by page
     *
     * @param array $page
     *
     * @return array
     */
    private function findByInPage(array $page)
    {
        try {
            $page = implode(", ", array_map(function ($data) {
                return "'".$data."'";
            }, $page));

            return $this->postgres
                ->query("
                    SELECT p.id, p.page FROM page p WHERE p.task_id = {$this->id} AND p.page IN ({$page}) 
                ")
                ->getResult();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
            return [];
        }
    }

    /**
     * add page
     *
     * @param array $data
    */
    private function flushPage(array $data)
    {
        $sql = "INSERT INTO page (id, task_id, page) VALUES ";

        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $sql .= "(nextval('page_id_seq'), ";
            $sql .= $this->id.", ";
            $sql .= "'".$data[$i]."') ";

            if ($i != $count -1)
                $sql .= ",";
        }

        try {
            $this->postgres->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }

    /**
     * find by phrase
     *
     * @param array $phrases
     *
     * @return array
    */
    private function findByInPhrase($phrases)
    {
        try {
            $phrases = implode(", ", array_map(function ($data) {
                return "'".$data."'";
            }, $phrases));

            return $this->postgres
                ->query("
                    SELECT p.id, p.phrase FROM phrase p WHERE p.phrase IN ({$phrases})
                ")
                ->getResult();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
            return [];
        }
    }

    /**
     * add phrase
     *
     * @param array $data
     * @param array $ws
     */
    private function flushPhrase(array $data, array $ws)
    {
        $sql = "INSERT INTO phrase (id, phrase, wordstat) VALUES ";

        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $sql .= "(nextval('phrase_id_seq'), ";
            $sql .= "'".$data[$i]."', ";
            $sql .= $ws[$data[$i]].") ";

            if ($i != $count -1)
                $sql .= ",";
        }

        try {
            $this->postgres->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }

    /**
     * find by page phrase
     *
     * @param int $page
     * @param array $phrases
     *
     * @return array
     */
    private function findByInPagePhrase($page, array $phrases)
    {
        try {
            $phrases = implode(", ", array_map(function ($data) {
                return "'".$data['phrase']."'";
            }, $phrases));

            return $this->postgres
                ->query("
                    SELECT 
                      phm.id as phrase
                    FROM phrase phm
                    WHERE 
                      phm.phrase IN ({$phrases})
                      AND phm.id NOT IN (
                        SELECT
                          ph.id
                        FROM page_phrase pp
                          LEFT JOIN phrase ph ON ph.id = pp.phrase_id
                        WHERE
                          pp.page_id = '{$page}'
                          AND ph.phrase IN ({$phrases})
                      )
                ")
                ->getResult();
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
            return [];
        }
    }

    /**
     * add page phrase
     *
     * @param int $page
     * @param array $data
     */
    private function flushPagePhrase($page, array $data)
    {
        $sql = "INSERT INTO page_phrase (page_id, phrase_id) VALUES ";

        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $sql .= "({$page}, {$data[$i]['phrase']}) ";

            if ($i != $count -1)
                $sql .= ",";
        }

        try {
            $this->postgres->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage().PHP_EOL;
        }
    }
}