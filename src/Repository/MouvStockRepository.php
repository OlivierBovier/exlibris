<?php

namespace App\Repository;

use App\Entity\MouvStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MouvStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method MouvStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method MouvStock[]    findAll()
 * @method MouvStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MouvStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MouvStock::class);
    }

//    /**
//     * @return MouvStock[] Returns an array of MouvStock objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MouvStock
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
