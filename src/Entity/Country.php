<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thekey;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $place_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt_names;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $area;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $continent_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $country_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $net;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wikipedia;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
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

    public function getPlaceId(): ?int
    {
        return $this->place_id;
    }

    public function setPlaceId(?int $place_id): self
    {
        $this->place_id = $place_id;

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

    public function getAltNames(): ?string
    {
        return $this->alt_names;
    }

    public function setAltNames(?string $alt_names): self
    {
        $this->alt_names = $alt_names;

        return $this;
    }

    public function getPop(): ?string
    {
        return $this->pop;
    }

    public function setPop(?string $pop): self
    {
        $this->pop = $pop;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getContinentId(): ?int
    {
        return $this->continent_id;
    }

    public function setContinentId(?int $continent_id): self
    {
        $this->continent_id = $continent_id;

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

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function setNet(?string $net): self
    {
        $this->net = $net;

        return $this;
    }

    public function getWikipedia(): ?string
    {
        return $this->wikipedia;
    }

    public function setWikipedia(?string $wikipedia): self
    {
        $this->wikipedia = $wikipedia;

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
