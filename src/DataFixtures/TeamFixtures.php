<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $team = new Team();
        $team->setThekey('Thekey');
        $team->setTitle('Title');
        $team->setTitle2('Title2');
        $team->setCode('Code');
        $team->setCountryId(12);
        $team->setCityId(null);
        $team->setWeb('web');

        $manager->persist($team);
        $manager->flush();
    }
}
