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

use AppBundle\Entity\Top;

class AddTopCommand extends ContainerAwareCommand
{
    /**
     * @var array
    */
    private $tops = [
        '3' => 'Топ 3',
        '5' => 'Топ 5',
        '10' => 'Топ 10',
    ];

    protected function configure()
    {
        $this
            ->setName('add:top')
            ->setDescription('Добвляем значения топов');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $before = round((memory_get_usage() / 1024), 2);

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        foreach ($this->tops as $topValue => $name) {
            $top = new Top();
            $top->setTop($topValue);
            $top->setName($name);

            $em->persist($top);
        }

        $em->flush();

        echo "Memory usage: " . round((memory_get_usage() / 1024) - $before, 2) . " KB" . PHP_EOL;
    }
}