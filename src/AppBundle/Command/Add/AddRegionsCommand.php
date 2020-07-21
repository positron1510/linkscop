<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 02.06.16
 * Time: 20:23
 */

namespace AppBundle\Command\Add;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use AppBundle\Entity\Region;

class AddRegionsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('add:regions')
            ->setDescription('Добвляем значения топов');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $before = round((memory_get_usage() / 1024), 2);

        $regions = unserialize(file_get_contents(__DIR__ . "/../../../../regions.txt"));

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        foreach ($regions as $region) {
            $regionEntity = new Region();
            $regionEntity->setName($region['region']);
            $regionEntity->setCode($region['code']);

            $em->persist($regionEntity);
        }

        $em->flush();

        echo "Memory usage: " . round((memory_get_usage() / 1024) - $before, 2) . " KB" . PHP_EOL;
    }
}