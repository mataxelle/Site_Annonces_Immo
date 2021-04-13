<?php

namespace App\Repository;

use App\Entity\Propertie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Propertie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propertie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propertie[]    findAll()
 * @method Propertie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propertie::class);
    }

    // /**
    //  * @return Propertie[] Returns an array of Propertie objects
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
    public function findOneBySomeField($value): ?Propertie
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
