<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Initiation
 *
 * @ORM\Table(name="initiation")
 * @ORM\Entity
 */
class Initiation
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="NBPLACESINIT", type="bigint", nullable=true)
     */
    private $nbplacesinit;

    /**
     * @var \Evenement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDEVENEMENT", referencedColumnName="IDEVENEMENT")
     * })
     */
    private $idevenement;

    public function getNbplacesinit(): ?string
    {
        return $this->nbplacesinit;
    }

    public function setNbplacesinit(?string $nbplacesinit): self
    {
        $this->nbplacesinit = $nbplacesinit;

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
