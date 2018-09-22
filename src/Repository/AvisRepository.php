<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Avis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avis[]    findAll()
 * @method Avis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    /**
     * @return Avis[] Returns an array of Avis objects
     */
    public function findByLivres($id)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.livre = :val')
            ->setParameter('val', $id)
            ->orderBy('a.date_avis', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findBy('livre' => $livre, 'user_connecte' => $user_connecte): ?Avis
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.livre = :val1')
            ->andWhere('a.user = :val2')
            ->setParameter('val1', $livre)
            ->setParameter('val2', $user_connecte)
            ->getQuery()
            ->getResult()
        ;
    }



//    /**
//     * @return Avis[] Returns an array of Avis objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Avis
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
