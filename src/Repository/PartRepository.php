<?php

namespace App\Repository;

use App\Entity\Part;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Part|null find($id, $lockMode = null, $lockVersion = null)
 * @method Part|null findOneBy(array $criteria, array $orderBy = null)
 * @method Part[]    findAll()
 * @method Part[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Part::class);
    }

     /**
     * @return Part[] Returns an array of Part objects
      */
    
    public function findAllParts($id)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.make = :val')
            ->setParameter('val', $value)
            ->orderBy('c.model', 'ASC')
            ->orderBy('c.travelledDistance', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Part
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
