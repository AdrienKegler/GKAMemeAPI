<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FileRepository")
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="File_id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="File_name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=512, name="File_path")
     */
    private $path;

    /**
     * @ORM\Column(type="integer", name="File_weight")
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", name="File_sizeX")
     */
    private $sizeX;
    /**
     * @ORM\Column(type="integer", name="File_sizeY")
     */
    private $sizeY;

    /**
     * @ORM\Column(type="date", name="File_uploadDate")
     */
    private $uploadDate;

    /**
     * @ORM\Column(type="integer", name="File_seen")
     */
    private $seen = 0;
    /**
     * @ORM\Column(type="integer", name="File_likes")
     */
    private $likes = 0;
    /**
     * @ORM\Column(type="integer", name="File_downloaded")
     */
    private $downloaded = 0;

    /**
     * @ORM\Column(type="boolean", name="File_isPrivate")
     */
    private $isPrivate = FALSE;

    /**
     * Many Groups have Many User.
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="files")
     */
    private $tags;

    /**
     * Many Files have One Uploader.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="files")
     * @ORM\JoinColumn(name="uploader_id", referencedColumnName="User_id")
     */
    private $uploader;

    public function __construct() {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getSizeX()
    {
        return $this->sizeX;
    }

    /**
     * @param mixed $sizeX
     */
    public function setSizeX($sizeX): void
    {
        $this->sizeX = $sizeX;
    }

    /**
     * @return mixed
     */
    public function getSizeY()
    {
        return $this->sizeY;
    }

    /**
     * @param mixed $sizeY
     */
    public function setSizeY($sizeY): void
    {
        $this->sizeY = $sizeY;
    }

    /**
     * @return mixed
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * @param mixed $uploadDate
     */
    public function setUploadDate($uploadDate): void
    {
        $this->uploadDate = $uploadDate;
    }

    /**
     * @return mixed
     */
    public function getSeen()
    {
        return $this->seen;
    }

    public function incrementSeen()
    {
        $this->setSeen($this->getSeen()+1);
    }

    /**
     * @param mixed $seen
     */
    private function setSeen($seen): void
    {
        $this->seen = $seen;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    public function incrementLikes(): void
    {
        $this->setLikes($this->getLikes()+1);
    }

    /**
     * @param mixed $likes
     */
    private function setLikes($likes): void
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getDownloaded()
    {
        return $this->downloaded;
    }

    public function incrementDownloaded(): void
    {
        $this->setDownloaded($this->getDownloaded()+1);
    }

    /**
     * @param mixed $downloaded
     */
    private function setDownloaded($downloaded): void
    {
        $this->downloaded = $downloaded;
    }

    /**
     * @return mixed
     */
    public function getisPrivate()
    {
        return $this->isPrivate;
    }

    /**
     * @param mixed $isPrivate
     */
    public function setIsPrivate($isPrivate): void
    {
        $this->isPrivate = $isPrivate;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getUploader()
    {
        return $this->uploader;
    }

    /**
     * @param mixed $uploader
     */
    public function setUploader($uploader): void
    {
        $this->uploader = $uploader;
    }



}
