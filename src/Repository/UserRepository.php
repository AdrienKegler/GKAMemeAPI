<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }


    public function findOneByEMail($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.mail = :value')->setParameter('value', $value)
            ->setMaxResults(2)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY)
        ;
    }
    public function findOneByMail($value)
    {
        return $this->findOneByEMail($value);
    }

    public function findOneById($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = :value')->setParameter('value', $value)
            ->setMaxResults(2)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY)
            ;
    }
}
