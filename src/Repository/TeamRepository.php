<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Team::class);
    }

    private function prepareData($data)
    {
        $out = [];
        $i = 0;
        foreach($data as $d){
            $out[$i]['thekey'] = $d->getThekey();
            $out[$i]['title'] = $d->getTitle();
            $out[$i]['title2'] = $d->getTitle2();
            $out[$i]['code'] = $d->getCode();
            $out[$i]['web'] = $d->getWeb();            
            $i++;
        }

        return $out;
    }

    public function getAllItems()
    {
        $data = $this->createQueryBuilder('t')
        ->getQuery()
        ->getResult()
        ;
        
        return $data;
    }

    public function getAllItemsByCountryId($countryId = null)
    {
        if(!$countryId){
            $data = $this->getAllItems();
        }else{
            $data = $this->createQueryBuilder('t')
            ->andWhere('t.country_id =:val')
            ->setParameter('val', $countryId)
            // ->orderBy('t.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
        }
    
        return $this->prepareData($data);
    }


    // /**
    //  * @return Team[] Returns an array of Team objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Team
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
