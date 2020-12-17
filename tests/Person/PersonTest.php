<?php

namespace App\Tests\Person;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonTest extends WebTestCase
{
    private function dataTest($data)
    {
        $this->assertNotEmpty($data->thekey);
        $this->assertNotEmpty($data->name);
        $this->assertNotEmpty($data->code);
        $this->assertNotEmpty($data->born_at);
        $this->assertNotEmpty($data->city_id);

        $this->assertNotEmpty($data->region_id);
        $this->assertNotEmpty($data->country_id);
        $this->assertNotEmpty($data->nationality_id);
        $this->assertNotEmpty($data->created_at);                                
        $this->assertNotEmpty($data->updated_at);                                        
    }

    public function testPersonByNationalityId()
    {
        $client = static::createClient();

        $client->request('GET', '/api/persons/42');  
        

        $res = $client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $content = $res->getContent();
        $d = json_decode($content);

        $this->assertEquals('ok', $d->status);
        $this->assertTrue(is_array($d->data));
        $this->assertEquals(1, count($d->data));

        $this->dataTest($d->data[0]);
    }

    public function testPersonByNotExistNationalityId()
    {
        $client = static::createClient();

        $client->request('GET', '/api/persons/4234');  
        

        $res = $client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $content = $res->getContent();
        $d = json_decode($content);

        $this->assertEquals('ok', $d->status);
        $this->assertTrue(is_array($d->data));
        $this->assertEquals(0, count($d->data));
    }

}