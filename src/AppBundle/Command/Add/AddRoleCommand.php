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

use AppBundle\Entity\Role;

class AddRoleCommand extends ContainerAwareCommand
{
    /**
     * @var array
    */
    private $roles = [
        'ROLE_USER' => 'Пользователь',
        'ROLE_ADMIN' => 'Администратор',
    ];

    protected function configure()
    {
        $this
            ->setName('add:role')
            ->setDescription('Добвляем значения топов');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $before = round((memory_get_usage() / 1024), 2);

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        foreach ($this->roles as $role => $name) {
            $roleEntity = new Role();
            $roleEntity->setRole($role);
            $roleEntity->setName($name);

            $em->persist($roleEntity);
        }

        $em->flush();

        echo "Memory usage: " . round((memory_get_usage() / 1024) - $before, 2) . " KB" . PHP_EOL;
    }
}