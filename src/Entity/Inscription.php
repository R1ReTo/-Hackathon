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
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEINCRIPTION", type="date", nullable=true)
     */
    private $dateincription;

    /**
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDHACKATHON", referencedColumnName="IDHACKATHON")
     * })
     */
    private $idhackathon;

    /**
     * @var \Participant
     *
     * @ORM\ManyToOne(targetEntity="Participant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPARTICIPANT", referencedColumnName="IDPARTICIPANT")
     * })
     */
    private $idparticipant;

    public function getNumincription(): ?int
    {
        return $this->numincription;
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

    public function getIdhackathon(): ?Hackathon
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(?Hackathon $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getIdparticipant(): ?Participant
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(?Participant $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
    }


}