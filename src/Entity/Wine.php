<?php

namespace App\Entity;

use App\Repository\WineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WineRepository::class)
 */
class Wine
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cepage;

    /**
     * @ORM\Column(type="integer")
     */
    private $millesime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="wines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;

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

    public function getCepage(): ?string
    {
        return $this->cepage;
    }

    public function setCepage(string $cepage): self
    {
        $this->cepage = $cepage;

        return $this;
    }

    public function getMillesime(): ?int
    {
        return $this->millesime;
    }

    public function setMillesime(int $millesime): self
    {
        $this->millesime = $millesime;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
