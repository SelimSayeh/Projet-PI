<?php

namespace EventsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventsControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

    public function testDisplay()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/display');
    }

    public function testModify()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modify');
    }

}
