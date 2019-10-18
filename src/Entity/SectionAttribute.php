<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionAttributeRepository")
 */
class SectionAttribute
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
    private $skillTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experienceTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $educationTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $projectTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recommendationTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactTitle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillTitle(): ?string
    {
        return $this->skillTitle;
    }

    public function setSkillTitle(string $skillTitle): self
    {
        $this->skillTitle = $skillTitle;

        return $this;
    }

    public function getExperienceTitle(): ?string
    {
        return $this->experienceTitle;
    }

    public function setExperienceTitle(string $experienceTitle): self
    {
        $this->experienceTitle = $experienceTitle;

        return $this;
    }

    public function getEducationTitle(): ?string
    {
        return $this->educationTitle;
    }

    public function setEducationTitle(string $educationTitle): self
    {
        $this->educationTitle = $educationTitle;

        return $this;
    }

    public function getProjectTitle(): ?string
    {
        return $this->projectTitle;
    }

    public function setProjectTitle(string $projectTitle): self
    {
        $this->projectTitle = $projectTitle;

        return $this;
    }

    public function getRecommendationTitle(): ?string
    {
        return $this->recommendationTitle;
    }

    public function setRecommendationTitle(string $recommendationTitle): self
    {
        $this->recommendationTitle = $recommendationTitle;

        return $this;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(string $contactTitle): self
    {
        $this->contactTitle = $contactTitle;

        return $this;
    }
}
