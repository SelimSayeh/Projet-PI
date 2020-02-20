<?php

namespace CastingBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CastingControllerTest extends WebTestCase
{
    public function testAddcasting()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AddCasting');
    }

}
