<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserStatusRepository")
 */
class UserStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="userStatus_id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=TRUE, length=100, name="userStatus_name")
     */
    private $name;


    public function __construct() {}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getObjectById()
    {
       return $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->find($id);
    }

}
