<?php

namespace AppBundle\Support;

use AppBundle\Support\Majestic;

class Kostyli
{
    public $result = [];

    public function __construct($task, $id)
    {
        if (is_file('tasks/'.$id.'/majestic')) {
            $this->result = unserialize(file_get_contents('tasks/'.$id.'/majestic'));
            return;
        }

        try{
            mkdir('tasks/'.$id, 0777);
        }catch (\ErrorException $ex){}

        $pages = $task['pages'];

        foreach ($pages as $selfPage=>$page)
        {
            $selfPage = rtrim($selfPage, '/');

            $domains = [];
            foreach ($page['domains'] as $domain) {
                $d = $domain['domain'];
                if (!in_array($d, $domains)) {
                    $domains[] = rtrim($d, '/');
                }
            }

            if (!in_array($selfPage, $domains)) {
                $majestic = new Majestic($selfPage);

                $this->result[$selfPage]['page'] = explode('#', $selfPage)[0];
                $this->result[$selfPage]['visible'] = 0.00;
                $this->result[$selfPage]['links'] = $majestic->links;
                $this->result[$selfPage]['domains'] = $majestic->domains;
            }
        }

        file_put_contents('tasks/'.$id.'/majestic', serialize($this->result), FILE_USE_INCLUDE_PATH);
    }
}