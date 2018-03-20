<?php

namespace App\Repository;

use App\Entity\TagInheritency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TagInheritency|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagInheritency|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagInheritency[]    findAll()
 * @method TagInheritency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagInheritencyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TagInheritency::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
