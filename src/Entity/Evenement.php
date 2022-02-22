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

    /**
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDHACKATHON", referencedColumnName="IDHACKATHON")
     * })
     */
    private $idhackathon;


}
