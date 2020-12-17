<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $country = new Country();
        $country->setName('Burundi');
        $country->setCreatedAt(new \DateTime('now'));
        $manager->persist($country);

        $country = new Country();        
        $country->setName('Comoros');
        $country->setCreatedAt(new \DateTime('now'));
        $manager->persist($country);        

        $manager->flush();
    }
}
