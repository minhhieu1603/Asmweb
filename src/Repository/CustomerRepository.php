<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    // /**
    // * @return Supplier[] Returns an array of Customer objects
    // */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->select('s.id, s.name, count(p.id) as numberOfParts')
            ->innerJoin('App\Entity\Part', 'p', )
            ->where('s.isImporter = 1')
            ->groupBy('s.name')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Customer
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findCarBoughtByCustomer($value)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
        "
        SELECT c
        FROM App\Entity\Sale s JOIN App\Entity\Car c
        WITH s.customer= :val AND s.car=c.id
         ")
         ->setParameter('val',$value);
        return $query->getResult(); 
    }
}
