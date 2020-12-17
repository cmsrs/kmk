<?php

namespace App\Repository;

use App\Entity\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Country|null find($id, $lockMode = null, $lockVersion = null)
 * @method Country|null findOneBy(array $criteria, array $orderBy = null)
 * @method Country[]    findAll()
 * @method Country[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Country::class);
    }

    public function getCountryAndCountPerson()
    {
        $entityManager = $this->getEntityManager();
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT c.*, tmp.count FROM country c LEFT JOIN (SELECT p.country_id, count(p.id) as count FROM person p GROUP BY p.country_id) as tmp ON (c.id = tmp.country_id)';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $ret = $stmt->fetchAllAssociative();

        return $ret;
    }

}
