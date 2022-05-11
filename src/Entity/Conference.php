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
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=false)
     */
    private $mail;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }


}
