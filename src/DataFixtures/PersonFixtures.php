<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $person = new Person();
        $person->setThekey( 'thekey');
        $person->setName( 'name');
        $person->setCode('code');
        $person->setBornAt(new \DateTime('now'));
        $person->setCityId(100);
        $person->setRegionId(100);
        $person->setCountryId(1);
        $person->setNationalityId(42);        
        $person->setCreatedAt(new \DateTime('now'));
        $person->setUpdatedAt(new \DateTime('now'));
        $manager->persist($person);


        $person = new Person();
        $person->setThekey( 'thekey');
        $person->setName( 'name');
        $person->setCode('code');
        $person->setBornAt(new \DateTime('now'));
        $person->setCityId(100);
        $person->setRegionId(100);
        $person->setCountryId(2);
        $person->setNationalityId(43);        
        $person->setCreatedAt(new \DateTime('now'));
        $person->setUpdatedAt(new \DateTime('now'));
        $manager->persist($person);


        $person = new Person();
        $person->setThekey( 'thekey');
        $person->setName( 'name');
        $person->setCode('code');
        $person->setBornAt(new \DateTime('now'));
        $person->setCityId(100);
        $person->setRegionId(100);
        $person->setCountryId(2);
        $person->setNationalityId(44);        
        $person->setCreatedAt(new \DateTime('now'));
        $person->setUpdatedAt(new \DateTime('now'));
        $manager->persist($person);
        
        $manager->flush();
    }
}
