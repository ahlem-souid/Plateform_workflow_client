<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Test extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();

        $client->request('GET', '/client/new');

        $this->assertEquals(500, $client->getResponse()->getStatusCode());
    }

}
