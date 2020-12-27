<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsStatic;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Announcement", mappedBy="Category")
     */
    private $Announcements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StaticPage", mappedBy="Category")
     */
    private $StaticPages;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->id = $Id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->IsActive;
    }

    public function setIsActive(bool $IsActive): self
    {
        $this->IsActive = $IsActive;

        return $this;
    }

    public function getIsStatic(): ?bool
    {
        return $this->IsStatic;
    }

    public function setIsStatic(bool $IsStatic): self
    {
        $this->IsStatic = $IsStatic;

        return $this;
    }

    public function __construct()
    {
        $this->Announcements = new ArrayCollection();
        $this->StaticPages = new ArrayCollection();
    }

    /**
     * @return Collection|Annoucement[]
     */
    public function getAnnouncements()
    {
        return $this->Announcements;
    }

    /**
     * @return Collection|StaticPage[]
     */
    public function getStaticPages()
    {
        return $this->StaticPages;
    }

    public function __toString()
    {   
        return $this->Name;
    }
}
