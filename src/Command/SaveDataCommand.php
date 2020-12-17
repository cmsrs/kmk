<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;


use App\Entity\Person;
use App\Entity\Team;
use App\Entity\Country;

class SaveDataCommand extends Command
{
    /**
     *  date from:
        https://github.com/jokecamp/FootballData/blob/master/openFootballData/persons.json
        https://github.com/jokecamp/FootballData/blob/master/openFootballData/teams.json
        https://github.com/jokecamp/FootballData/blob/master/openFootballData/countries.json
    */

    // the name of the command (the part after "bin/console")
    private $container;    
    private $em;
    
    protected static $defaultName = 'app:save-data';

    protected function configure()
    {
        // ...
    }

    public function __construct(ContainerInterface $container, EntityManagerInterface $em)
    {
        parent::__construct();
        $this->container = $container;
        $this->em = $em;
        
    }    

    private function getDataFromFile( $file )
    {
        $f = getcwd().'/src/Command/Data/'.$file;

        if( !file_exists($f) ){
            die('file not found: '.$f );
        }

        $data = file_get_contents( $f );
        $dd = json_decode($data);
        return $dd;
    }

    private function saveTablePerson( $dd )
    {
        foreach($dd as $d){
            $person = new Person();

            $person->setThekey( $d->key);
            $person->setName( $d->name);
            $person->setCode( $d->code);
            //$person->setBornAt($d->born_at);
            $person->setCityId($d->city_id);
            $person->setRegionId($d->region_id);
            $person->setCountryId($d->country_id);
            $person->setNationalityId($d->nationality_id);
            $person->setCreatedAt( \DateTime::createFromFormat('Y-m-d', explode('T', $d->created_at)[0]));
            //$person->setUpdatedAt($d->updated_at);
    
            $this->em->persist($person);
            $this->em->flush();            
        }
    }

    private function saveTableTeam( $dd )
    {
        foreach($dd as $d){
            $team = new Team();
            $team->setThekey( $d->key );
            $team->setTitle($d->title);
            $team->setTitle2($d->title2);
            $team->setCode($d->code);
            $team->setCountryId($d->country_id);
            $team->setCityId($d->city_id);
            $team->setWeb($d->web);
        
            $this->em->persist($team);
            $this->em->flush();            
        }
    }

    private function saveTableCountries($dd)
    {
        foreach($dd as $d){
            $country = new Country();
            $country->setName($d->name);
            $country->setCreatedAt( \DateTime::createFromFormat('Y-m-d', explode('T', $d->created_at)[0]));
    
            $this->em->persist($country);
            $this->em->flush();            
        }
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dataPerson = $this->getDataFromFile( 'persons.json' );
        $this->saveTablePerson( $dataPerson );

        $dataTeams = $this->getDataFromFile('teams.json');
        $this->saveTableTeam($dataTeams);

        $dataCountries = $this->getDataFromFile('countries.json');
        $this->saveTableCountries($dataCountries);

        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command.

        // return this if there was no problem running the command
        return 0;

        // or return this if some error happened during the execution
        // return 1;
    }
}