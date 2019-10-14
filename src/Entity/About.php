<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AboutRepository")
 * @Vich\Uploadable
 */
class About
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $cv;

    /**
     * @Vich\UploadableField(mapping="cv_doc", fileNameProperty="cv")
     * @var File
     */
    private $cvFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $unsplashBgImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $myBgImage;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="myBgImage")
     * @var File
     */
    private $myBgImageFile;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getCvFile()
    {
        return $this->cvFile;
    }

    public function setCvFile(File $cv = null)
    {
        $this->cvFile = $cv;
        if ($cv) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getUnsplashBgImage():  ?string
    {
        return $this->unsplashBgImage;
    }
    public function setUnsplashBgImage(?string $unsplashBgImage): self
    {
        $this->unsplashBgImage = $unsplashBgImage;

        return $this;
    }

    public function getMyBgImage(): ?string
    {
        return $this->myBgImage;
    }

    public function setMyBgImage(?string $myBgImage): self
    {
        $this->myBgImage = $myBgImage;

        return $this;
    }

    public function setMyBgImageFile(File $myBgImage = null)
    {
        $this->myBgImageFile = $myBgImage;
        if ($myBgImage) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getMyBgImageFile()
    {
        return $this->myBgImageFile;
    }

}
