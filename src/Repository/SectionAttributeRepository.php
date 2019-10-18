<?php

namespace App\Repository;

use App\Entity\SectionAttribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SectionAttribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionAttribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionAttribute[]    findAll()
 * @method SectionAttribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionAttributeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionAttribute::class);
    }

    // /**
    //  * @return SectionAttribute[] Returns an array of SectionAttribute objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SectionAttribute
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
