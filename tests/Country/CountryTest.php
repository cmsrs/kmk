<?php

namespace App\Tests\Person;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CountryTest extends WebTestCase
{

    public function testCountryAndNumPersons()
    {
        $client = static::createClient();

        $client->request('GET', '/api/countries');  
        

        $res = $client->getResponse();

        $this->assertEquals(200, $res->getStatusCode());

        $content = $res->getContent();
        $d = json_decode($content);

        $this->assertEquals('ok', $d->status);
        $this->assertTrue(is_array($d->data));
        $this->assertEquals(2, count($d->data));

        $this->assertNotEmpty($d->data[0]->name);
        $this->assertEquals(1, $d->data[0]->count);        

        $this->assertNotEmpty($d->data[1]->name);
        $this->assertEquals(2, $d->data[1]->count);                
    }

}