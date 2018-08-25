<?php

namespace App\Repository;

use App\Entity\LignesCde;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LignesCde|null find($id, $lockMode = null, $lockVersion = null)
 * @method LignesCde|null findOneBy(array $criteria, array $orderBy = null)
 * @method LignesCde[]    findAll()
 * @method LignesCde[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignesCdeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LignesCde::class);
    }

//    /**
//     * @return LignesCde[] Returns an array of LignesCde objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LignesCde
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
