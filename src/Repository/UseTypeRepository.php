<?php

namespace App\Repository;

use App\Entity\UseType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UseType|null find($id, $lockMode = null, $lockVersion = null)
 * @method UseType|null findOneBy(array $criteria, array $orderBy = null)
 * @method UseType[]    findAll()
 * @method UseType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UseTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UseType::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
