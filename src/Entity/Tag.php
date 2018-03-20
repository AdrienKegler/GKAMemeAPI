<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="Tag_id")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=100, name="Tag_name")
     */
    private $name;

    /**
     * @ORM\Column(type="integer", name="Tag_likes")
     */
    private $likes = 0;

    /**
     * @ORM\Column(type="string", length=100, nullable=TRUE,  name="Tag_dscrp")
     */
    private $dscrp;

    /* Ci-dessous : liens extérieurs */

    /**
     * Many Tags have Many Files.
     * @ORM\ManyToMany(targetEntity="File", inversedBy="tags")
     * @ORM\JoinTable(name="Tags_Files",
     *     joinColumns={@ORM\JoinColumn(name="Tag_id", referencedColumnName="Tag_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="File_id", referencedColumnName="File_id")}
     *     )
     */
    private $files;

    /**
     * As tags, they're related to me
     * Many Tags have Many Tags.
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="myRelatedTags")
     */
    private $tagsRelatedToMe;

    /**
     * As a tag, I'm related to them
     * Many Tags have many Tags.
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="tagsRelatedToMe")
     * @ORM\JoinTable(name="relatedTags",
     *      joinColumns={@ORM\JoinColumn(name="Tag_id", referencedColumnName="Tag_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Tag_related", referencedColumnName="Tag_id")}
     *      )
     */
    private $myRelatedTags;


    /* Construct et getters/setters */

    public function __construct() {
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tagsRelatedToMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myRelatedTags = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes): void
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getDscrp()
    {
        return $this->dscrp;
    }

    /**
     * @param mixed $dscrp
     */
    public function setDscrp($dscrp): void
    {
        $this->dscrp = $dscrp;
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

    /**
     * @return mixed
     */
    public function getTagsRelatedToMe()
    {
        return $this->tagsRelatedToMe;
    }

    /**
     * @param mixed $tagsRelatedToMe
     */
    public function setTagsRelatedToMe($tagsRelatedToMe): void
    {
        $this->tagsRelatedToMe = $tagsRelatedToMe;
    }

    /**
     * @return mixed
     */
    public function getMyRelatedTags()
    {
        return $this->myRelatedTags;
    }

    /**
     * @param mixed $myRelatedTags
     */
    public function setMyRelatedTags($myRelatedTags): void
    {
        $this->myRelatedTags = $myRelatedTags;
    }



}
