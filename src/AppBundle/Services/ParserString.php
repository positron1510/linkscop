<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 15.06.16
 * Time: 18:08
 */

namespace AppBundle\Services;

class ParserString
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $dir;

    /**
     * init variable
     *
     * @param string $dir
    */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    /**
     * Set data value
     *
     * @param $data
     *
     * @return self
    */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * check value redis
     *
     * @return boolean
     */
    public function isParse()
    {
        $urls = array_keys($this->data);
        foreach ($urls as $item) {
            $isUrl = preg_match("/.*(http(s)?:\/\/)/i", $item, $matches);
            if (!$isUrl) return true;
        }

        return false;
    }

    /**
     * Parser string page
     *
     * @return array
     */
    public function getCSVWords()
    {
        $file = file($this->dir.$this->data);

        $result = [];
        $count = count($file);
        for ($i = 0; $i < $count; $i++) {
            $data = explode(';', $file[$i]);
            if (!isset($data[1])) continue;

            if ($data[1]) {
                $result[trim($data[2])][] = [
                    'phrase' => trim($data[0]),
                    'ws' => trim($data[1]),
                ];
            } else {
                $result[trim($data[2])][] = trim($data[0]);
            }
        }

        $this->data = $result;

        return $result;
    }

    /**
     * Parser string words
     *
     * @return array
    */
    public function getStringWords()
    {
        $pages = [];
        $counter = 1;

        $str = explode(PHP_EOL, $this->data);

        $result = [];
        $cluster = [];
        $count = count($str);
        for ($i = 0; $i < $count; $i++) {
            if (strlen($str[$i]) < 3) {
                $result[] = $cluster;
                $cluster = [];
                continue;
            }

            $cluster[] = $str[$i];

            if ($i == ($count - 1)) {
                $result[] = $cluster;
            }
        }

        $main = [];
        $count = count($result);
        for ($i = 0; $i < $count; $i++) {
            if (count($result[$i]) <= 1) continue;

            $cluster = $result[$i];
            $page = trim(array_shift($cluster));

            if (in_array($page, $pages)) {
                $page .= '#' . $counter;
                $counter++;
            }else {
                $pages[] = $page;
            }

            $countWords = count($cluster);
            for ($key = 0; $key < $countWords; $key++) {
                $keyWords = trim($cluster[$key]);
                $main[$page][$keyWords] = $keyWords;
            }
        }

        $this->data = $main;

        return $main;
    }
}