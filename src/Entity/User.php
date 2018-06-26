<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="User")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="User_id")
     */
    private $id;


    /**
     * @ORM\Column(type="string", unique=TRUE, length=100, name="User_mail")
     */
    private $mail;


    /**
     * @ORM\Column(type="string", length=255, name="User_password")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100, name="User_name")
     */
    private $name;


    /**
     * @ORM\Column(type="string", length=100, name="User_firstname")
     */
    private $firstname;


    /**
     * @ORM\Column(type="date", name="User_birthday")
     */
    private $birthday;


    /**
     * @ORM\Column(type="date", name="User_subscription_birthday")
     */
    private $subscriptionBirthday;

    /**
     * @ORM\ManyToOne(targetEntity="UserStatus")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="userStatus_id")
     */
    private $status;


    /**
     * @ORM\ManyToOne(targetEntity="File")
     * @ORM\JoinColumn(name="avatar", nullable=TRUE, referencedColumnName="File_id")
     */
    private $avatar;

    /**
     * One User has Many Files.
     * @ORM\OneToMany(targetEntity="File", mappedBy="uploader")
     */
    private $files;

    /**
     * Many User has Many Favorites Files.
     * @ORM\ManyToMany(targetEntity="File", mappedBy="uploader")
     */
    private $favorites;

    public function __construct() {
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionBirthday()
    {
        return $this->subscriptionBirthday;
    }

    /**
     * @param mixed $subscriptionBirthday
     */
    public function setSubscriptionBirthday($subscriptionBirthday): void
    {
        $this->subscriptionBirthday = $subscriptionBirthday;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files): void
    {
        $this->files = $files;
    }

}
