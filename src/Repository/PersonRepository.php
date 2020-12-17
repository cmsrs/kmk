<?php

namespace App\Repository;

use App\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Person|null find($id, $lockMode = null, $lockVersion = null)
 * @method Person|null findOneBy(array $criteria, array $orderBy = null)
 * @method Person[]    findAll()
 * @method Person[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    private function prepareData($data)
    {
        $out = [];
        $i = 0;
        foreach($data as $d){
            $out[$i]['thekey'] = $d->getThekey();
            $out[$i]['name'] = $d->getName();
            $out[$i]['code'] = $d->getCode();
            $out[$i]['born_at'] = $d->getBornAt();

            $out[$i]['city_id'] = $d->getCityId();            
            $out[$i]['region_id'] = $d->getRegionId();            
            $out[$i]['country_id'] = $d->getCountryId();            
            $out[$i]['nationality_id'] = $d->getNationalityId();            
            $out[$i]['created_at'] = $d->getCreatedAt();            
            $out[$i]['updated_at'] = $d->getUpdatedAt();                                                                        
            $i++;
        }

        return $out;
    }    

    public function getItemsByNationalityId($nationalityId)
    {
        $data = $this->createQueryBuilder('t')
        ->andWhere('t.nationality_id =:val')
        ->setParameter('val', $nationalityId)
        // ->orderBy('t.id', 'ASC')
        // ->setMaxResults(10)
        ->getQuery()
        ->getResult()
        ;

        return $this->prepareData($data);
    }

    // /**
    //  * @return Person[] Returns an array of Person objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Person
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
