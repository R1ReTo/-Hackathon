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
     * @var \Paricipant
     *
     * @ORM\ManyToOne(targetEntity="Paricipant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPARTICIPANT", referencedColumnName="IDPARTICIPANT")
     * })
     */
    private $idparticipant;


}
