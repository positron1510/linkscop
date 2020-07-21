<?php

namespace AppBundle\Twig;


class CutSharpExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('cut_sharp', [$this, 'cutSharp']),
        );
    }

    public function cutSharp($url)
    {
        return explode('#', $url)[0];
    }

    public function getName()
    {
        return 'cut_sharp_extension';
    }
}