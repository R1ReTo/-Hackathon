<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conf�rence
 *
 * @ORM\Table(name="conférence")
 * @ORM\Entity
 */
class Conf�rence
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
     * @var string|null
     *
     * @ORM\Column(name="NOMINTERVENANT", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $nomintervenant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOMINTERVENANT", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $prenomintervenant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SUJET", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $sujet;

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

    public function getNomintervenant(): ?string
    {
        return $this->nomintervenant;
    }

    public function setNomintervenant(?string $nomintervenant): self
    {
        $this->nomintervenant = $nomintervenant;

        return $this;
    }

    public function getPrenomintervenant(): ?string
    {
        return $this->prenomintervenant;
    }

    public function setPrenomintervenant(?string $prenomintervenant): self
    {
        $this->prenomintervenant = $prenomintervenant;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(?string $sujet): self
    {
        $this->sujet = $sujet;

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
