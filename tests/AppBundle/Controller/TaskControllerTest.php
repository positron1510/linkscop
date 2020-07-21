<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class TaskControllerTest extends WebTestCase
{
    /**
     * @var Client
    */
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testList()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('#task th')->count() > 0);
    }

    public function testProject()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/project/124');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('.task-words')->count() > 0);
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get("session");

        $firewall = 'main';

        $token = new UsernamePasswordToken('rdbn', null, $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}
