<?php

namespace App\Tests\Team;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamTest extends WebTestCase
{
    private function dataTest($data)
    {
        $this->assertNotEmpty($data->thekey);
        $this->assertNotEmpty($data->title);
        $this->assertNotEmpty($data->title2);
        $this->assertNotEmpty($data->code);
        $this->assertNotEmpty($data->web);
    }

    public function testTeam()
    {
        $client = static::createClient();

        $client->request('GET', '/api/teams');  
        
        $res = $client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $content = $res->getContent();
        $d = json_decode($content);

        $this->assertEquals('ok', $d->status);
        $this->assertTrue(is_array($d->data));
        $this->assertEquals(1, count($d->data));

        $this->dataTest($d->data[0]);
    }

    public function testTeamByExistCountry()    
    {
        $client = static::createClient();

        $client->request('GET', '/api/teams/12');  
        
        $res = $client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $content = $res->getContent();
        $d = json_decode($content);

        $this->assertEquals('ok', $d->status);
        $this->assertTrue(is_array($d->data));
        $this->assertEquals(1, count($d->data));
        $this->dataTest($d->data[0]);
    }    

    public function testTeamByNotExistCountry()    
    {
        $client = static::createClient();

        $client->request('GET', '/api/teams/1225');  
        
        $res = $client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $content = $res->getContent();
        $d = json_decode($content);

        $this->assertEquals('ok', $d->status);
        $this->assertTrue(is_array($d->data));
        $this->assertEquals(0, count($d->data));
    }


}