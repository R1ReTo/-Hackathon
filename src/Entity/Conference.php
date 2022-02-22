<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity
 */
class Conference
{
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


}
