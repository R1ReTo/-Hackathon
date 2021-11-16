<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="I_FK_EVENEMENT_HACKATHON", columns={"IDHACKATHON"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDEVENEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

    /**
     * @var int
     *
     * @ORM\Column(name="IDHACKATHON", type="integer", nullable=false)
     */
    private $idhackathon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $libelle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEHEUREDEBUT", type="datetime", nullable=true)
     */
    private $dateheuredebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEHEUREFIN", type="datetime", nullable=true)
     */
    private $dateheurefin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALLE", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $salle;

    public function getIdevenement(): ?int
    {
        return $this->idevenement;
    }

    public function getIdhackathon(): ?int
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(int $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateheuredebut(): ?\DateTimeInterface
    {
        return $this->dateheuredebut;
    }

    public function setDateheuredebut(?\DateTimeInterface $dateheuredebut): self
    {
        $this->dateheuredebut = $dateheuredebut;

        return $this;
    }

    public function getDateheurefin(): ?\DateTimeInterface
    {
        return $this->dateheurefin;
    }

    public function setDateheurefin(?\DateTimeInterface $dateheurefin): self
    {
        $this->dateheurefin = $dateheurefin;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(?string $salle): self
    {
        $this->salle = $salle;

        return $this;
    }


}
