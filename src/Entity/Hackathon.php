<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hackathon
 *
 * @ORM\Table(name="hackathon")
 * @ORM\Entity
 */
class Hackathon
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDHACKATHON", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhackathon;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEDEBUT", type="date", nullable=true)
     */
    private $datedebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HEUREDEBUT", type="time", nullable=true)
     */
    private $heuredebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATEFIN", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HEUREFIN", type="time", nullable=true)
     */
    private $heurefin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIEU", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RUE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $rue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VILLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CP", type="string", length=5, nullable=true, options={"fixed"=true})
     */
    private $cp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="THEME", type="string", length=255, nullable=true, options={"fixed"=true})
     */
    private $theme;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATELIMITE", type="date", nullable=true)
     */
    private $datelimite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NBPLACES", type="bigint", nullable=true)
     */
    private $nbplaces;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMAGE", type="string", length=255, nullable=true, options={"fixed"=true})
     */
    private $image;


}
