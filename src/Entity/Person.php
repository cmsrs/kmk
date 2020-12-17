<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thekey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $born_at;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $city_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $region_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $country_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nationality_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThekey(): ?string
    {
        return $this->thekey;
    }

    public function setThekey(?string $thekey): self
    {
        $this->thekey = $thekey;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getBornAt(): ?\DateTimeInterface
    {
        return $this->born_at;
    }

    public function setBornAt(?\DateTimeInterface $born_at): self
    {
        $this->born_at = $born_at;

        return $this;
    }

    public function getCityId(): ?int
    {
        return $this->city_id;
    }

    public function setCityId(?int $city_id): self
    {
        $this->city_id = $city_id;

        return $this;
    }

    public function getRegionId(): ?int
    {
        return $this->region_id;
    }

    public function setRegionId(?int $region_id): self
    {
        $this->region_id = $region_id;

        return $this;
    }

    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    public function setCountryId(?int $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }

    public function getNationalityId(): ?int
    {
        return $this->nationality_id;
    }

    public function setNationalityId(?int $nationality_id): self
    {
        $this->nationality_id = $nationality_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
