<?php

namespace App\Entity;

use App\Repository\AnnouncementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnouncementRepository::class)
 */
class Announcement
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
    private $Title;

    /**
     * @ORM\Column(type="text", length=65535)
     */
    private $Description;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePublish;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsPermisA2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsSold;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Cylindrical;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Km;

    private $Brand;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage1(): ?string
    {
        return $this->Image1;
    }

    public function setImage1(string $Image1): self
    {
        $this->Image1 = $Image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->Image2;
    }

    public function setImage2(string $Image2): self
    {
        $this->Image2 = $Image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->Image3;
    }

    public function setImage3(string $Image3): self
    {
        $this->Image3 = $Image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->Image4;
    }

    public function setImage4(string $Image4): self
    {
        $this->Image4 = $Image4;

        return $this;
    }

    public function getImage5(): ?string
    {
        return $this->Image5;
    }

    public function setImage5(string $Image5): self
    {
        $this->Image5 = $Image5;

        return $this;
    }

    public function setKm(string $Km): self
    {
        $this->Km = $Km;

        return $this;
    }

    public function getKm(): ?string
    {
        return $this->Km;
    }

     public function setBrand(string $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }


    public function getVirtualFilename1()
    {
        //Set path for easyadmin
        return realpath(__DIR__.'/../../templates/imagesmotos/'.$this->Image1);
    }

    public function setVirtualFilename1($Image1)
    {
        //Only keep last part of filepath
        $this->setPath(basename($Image1));
    }

    public function getVirtualFilename3()
    {
        //Set path for easyadmin
        return realpath(__DIR__.'/../../templates/imagesmotos/'.$this->Image3);
    }

    public function setVirtualFilename3($Image3)
    {
        //Only keep last part of filepath
        $this->setImage3(basename($Image3));
    }

    public function getVirtualFilename2()
    {
        //Set path for easyadmin
        return realpath(__DIR__.'/../../templates/imagesmotos/'.$this->Image2);
    }

    public function setVirtualFilename2($Image2)
    {
        //Only keep last part of filepath
        $this->setImage2(basename($Image2));
    }

    public function getVirtualFilename4()
    {
        //Set path for easyadmin
        return realpath(__DIR__.'/../../templates/imagesmotos/'.$this->Image4);
    }

    public function setVirtualFilename4($Image4)
    {
        //Only keep last part of filepath
        $this->setImage4(basename($Image4));
    }

    public function setVirtualFilename5($Image5)
    {
        //Only keep last part of filepath
        $this->setImage5(basename($Image5));
    }

    /////////////////////////Link between Annnouncement & User////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Announcements")
     */
    private $User;

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    ////////////////////////////////////////////


    ////////////////////////Link between Annnouncement & Category////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="Announcements")
     */
    private $Category;

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    /////////////////////////////////////////////////////////////////////

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCylindrical(): ?string
    {
        return $this->Cylindrical;
    }

    public function setCylindrical(string $Cylindrical): self
    {
        $this->Cylindrical = $Cylindrical;

        return $this;
    }

    public function getDatePublish(): ?\DateTimeInterface
    {
        return $this->DatePublish;
    }

    public function setDatePublish(\DateTimeInterface $DatePublish): self
    {
        $this->DatePublish = $DatePublish;

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

    public function getIsSold(): ?bool
    {
        return $this->IsSold;
    }

    public function setIsSold(bool $IsSold): self
    {
        $this->IsSold = $IsSold;

        return $this;
    }

    public function getIsPermisA2(): ?bool
    {
        return $this->IsPermisA2;
    }

    public function setIsPermisA2(bool $IsPermisA2): self
    {
        $this->IsPermisA2 = $IsPermisA2;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
    
}
