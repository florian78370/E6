<?php

namespace App\Repository;

use App\Entity\Cheval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cheval>
 *
 * @method Cheval|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cheval|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cheval[]    findAll()
 * @method Cheval[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChevalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cheval::class);
    }

   /**
    * @return Cheval[] Returns an array of Cheval objects
    */
   public function findByExampleField($value): array
   {
       return $this->createQueryBuilder('c')
           ->andWhere('c.exampleField = :val')
           ->setParameter('val', $value)
           ->orderBy('c.id', 'ASC')
           ->setMaxResults(10)
           ->getQuery()
           ->getResult()
       ;
   }

   public function findOneBySomeField($value): ?Cheval
   {
       return $this->createQueryBuilder('c')
           ->andWhere('c.exampleField = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }
}
