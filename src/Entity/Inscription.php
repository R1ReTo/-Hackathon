<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="I_FK_INSCRIPTION_HACKATHON", columns={"IDHACKATHON"}), @ORM\Index(name="I_FK_INSCRIPTION_PARICIPANT", columns={"IDPARTICIPANT"})})
 * @ORM\Entity
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="NUMINCRIPTION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numincription;

    /**
     * @var int
     *
     * @ORM\Column(name="IDPARTICIPANT", type="integer", nullable=false)
     */
    private $idparticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="IDHACKATHON", type="integer", nullable=false)
     */
    private $idhackathon;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEINCRIPTION", type="date", nullable=true)
     */
    private $dateincription;

    public function getNumincription(): ?int
    {
        return $this->numincription;
    }

    public function getIdparticipant(): ?int
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(int $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
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

    public function getDateincription(): ?\DateTimeInterface
    {
        return $this->dateincription;
    }

    public function setDateincription(?\DateTimeInterface $dateincription): self
    {
        $this->dateincription = $dateincription;

        return $this;
    }


}
