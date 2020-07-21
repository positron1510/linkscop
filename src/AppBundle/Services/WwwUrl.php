<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 05.07.16
 * Time: 19:35
 */

namespace AppBundle\Services;


class WwwUrl
{
    /**
     * add www urls
     *
     * @param string $url
     * 
     * @return string
    */
    public function getUrl($url)
    {
        preg_match("/http(s)?:\/\/(.*)\./i", $url, $matches);
        if (isset($matches[2])) {
            $url = str_replace($matches[2], "www." . $matches[2], $url);
        } else {
            $url = str_replace($matches[1], "www." . $matches[1], $url);
        }
        
        return $url;
    }
}