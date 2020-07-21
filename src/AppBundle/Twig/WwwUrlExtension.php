<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 05.07.16
 * Time: 19:33
 */

namespace AppBundle\Twig;

use AppBundle\Services\WwwUrl;

class WwwUrlExtension extends \Twig_Extension
{
    /**
     * @param WwwUrl
    */
    private $url;

    /**
     * init
    */
    public function __construct()
    {
        $this->url = new WwwUrl();
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('wwwUrl', [$this, 'urlFilter']),
        );
    }

    public function urlFilter($url, $isWww)
    {
        /*if ($isWww) {
            return $this->url->getUrl($url);
        }*/

        return rawurlencode($url);
    }

    public function getName()
    {
        return 'www_url_extension';
    }
}