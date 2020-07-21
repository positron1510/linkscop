<?php

namespace AppBundle\Support;

class Majestic
{
    public $domains;
    public $links;
    private $api_key = "16FBBF1DA62B0A1C8107EA8EDF534442";

    public function __construct($url)
    {
        $scheme = parse_url($url)['scheme'];

        if (preg_match("/$scheme:\/\/www\./uisU", $url)) {
            $url_without_www = str_ireplace("www.", "", $url);
            $url_with_www = $url;
        }else {
            $url_without_www = $url;
            $url_with_www = str_ireplace("$scheme://", "http://www.", $url);
        }

        foreach ([$url_with_www, $url_without_www] as $url)
        {
            $url = rawurlencode($url);
            $sxml = simplexml_load_file("https://api.majestic.com/api/xml?app_api_key={$this->api_key}&cmd=GetIndexItemInfo&items=1&item0=$url&datasource=fresh");
            $arr = array_combine(array_slice(explode('|', $sxml->DataTables->DataTable['Headers']), 4, 2), array_slice(explode('|', $sxml->DataTables->DataTable->Row), 4, 2));

            $this->links += $arr['ExtBackLinks'];
            $this->domains += $arr['RefDomains'];
        }
    }
}