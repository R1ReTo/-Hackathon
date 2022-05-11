<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptioninitiation
 *
 * @ORM\Table(name="inscriptioninitiation", indexes={@ORM\Index(name="idEvenement", columns={"idEvenement"})})
 * @ORM\Entity
 */
class Inscriptioninitiation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idInscription", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinscription;

    /**
     * @var string
     *
     * @ORM\Column(name="nomParticipant", type="string", length=20, nullable=false)
     */
    private $nomparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomParticipant", type="string", length=20, nullable=false)
     */
    private $prenomparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="mailParticipant", type="string", length=50, nullable=false)
     */
    private $mailparticipant;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvenement", referencedColumnName="IDEVENEMENT")
     * })
     */
    private $idevenement;

    public function getIdinscription(): ?int
    {
        return $this->idinscription;
    }

    public function getNomparticipant(): ?string
    {
        return $this->nomparticipant;
    }

    public function setNomparticipant(string $nomparticipant): self
    {
        $this->nomparticipant = $nomparticipant;

        return $this;
    }

    public function getPrenomparticipant(): ?string
    {
        return $this->prenomparticipant;
    }

    public function setPrenomparticipant(string $prenomparticipant): self
    {
        $this->prenomparticipant = $prenomparticipant;

        return $this;
    }

    public function getMailparticipant(): ?string
    {
        return $this->mailparticipant;
    }

    public function setMailparticipant(string $mailparticipant): self
    {
        $this->mailparticipant = $mailparticipant;

        return $this;
    }

    public function getIdevenement(): ?Evenement
    {
        return $this->idevenement;
    }

    public function setIdevenement(?Evenement $idevenement): self
    {
        $this->idevenement = $idevenement;

        return $this;
    }


}
