<?php

namespace App\Repository;

use App\Entity\UserStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserStatus[]    findAll()
 * @method UserStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserStatus::class);
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
