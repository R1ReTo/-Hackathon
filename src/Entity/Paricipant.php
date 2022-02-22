<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paricipant
 *
 * @ORM\Table(name="paricipant")
 * @ORM\Entity
 */
class Paricipant
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDPARTICIPANT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparticipant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM", type="string", length=15, nullable=true, options={"fixed"=true})
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSEMAIL", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $adressemail;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATENAISSANCE", type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PORTFOLIO", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $portfolio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LOGIN", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PASSWORD", type="string", length=50, nullable=true, options={"fixed"=true})
     */
    private $password;


}
