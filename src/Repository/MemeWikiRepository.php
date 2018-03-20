<?php

namespace App\Repository;

use App\Entity\MemeWiki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MemeWiki|null find($id, $lockMode = null, $lockVersion = null)
 * @method MemeWiki|null findOneBy(array $criteria, array $orderBy = null)
 * @method MemeWiki[]    findAll()
 * @method MemeWiki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemeWikiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MemeWiki::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
