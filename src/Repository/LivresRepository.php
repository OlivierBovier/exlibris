<?php

namespace App\Repository;

use App\Entity\Livres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Livres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livres[]    findAll()
 * @method Livres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Livres::class);
    }

    public function findRecent()
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.date_parution <= :val1')
            ->andWhere('l.active = :val2')
            ->setParameters(array('val1' => new \DateTime('now'), 'val2' => true))
            ->orderBy('l.date_parution', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findConseil()
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.est_conseil = :val1')
            ->andWhere('l.active = :val2')
            ->setParameters(array('val1' => true, 'val2' => true))
            ->orderBy('l.date_parution', 'DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneById($id): ?Livres
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findAllOrderRecent()
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.active = :val1')
            ->setParameters(array('val1' => true))
            ->orderBy('l.date_parution', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findWithFilter($auteur, $categorie, $conseil)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.auteur = :val1')
            ->andWhere('l.categorie = :val2')
            ->andWhere('l.est_conseil = :val3')
            ->setParameters(array('val1' => $auteur, 'val2' => $categorie, 'val3' => $conseil))
            ->orderBy('l.date_parution', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findSuggestion($id, $categorie)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.id != :val1')
            ->andWhere('l.categorie = :val2')
            ->setParameters(array('val1' => $id, 'val2' => $categorie))
            ->orderBy('l.date_parution', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Livres[] Returns an array of Livres objects
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
    public function findOneBySomeField($value): ?Livres
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
