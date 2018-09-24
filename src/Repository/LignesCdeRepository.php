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

    /**
     * @return LignesCde[] Returns an array of LignesCde objects
     */
    public function venteParLivre()
    {
        return $this->createQueryBuilder('lig')
            ->select('(lig.livre)', '(SUM(lig.qte_ligne_cde))') // Les parenthèses entourant les champs sont nécessaires en cas de Composite Keys
            ->leftJoin('lig.livre', 'liv')
            ->addSelect('liv.id', 'liv.titre', 'liv.image', 'liv.resume', 'liv.prix_ttc', 'liv.date_parution')
            ->leftJoin('liv.auteur', 'aut')
            ->addSelect('aut.prenom_auteur', 'aut.nom_auteur')
            ->groupBy('lig.livre')
            ->orderBy('SUM(lig.qte_ligne_cde)', 'DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult()
        ;
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
