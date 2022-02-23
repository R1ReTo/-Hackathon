<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity
 */
class Participant implements UserInterface
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

    public function getIdparticipant(): ?int
    {
        return $this->idparticipant;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdressemail(): ?string
    {
        return $this->adressemail;
    }

    public function setAdressemail(?string $adressemail): self
    {
        $this->adressemail = $adressemail;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getPortfolio(): ?string
    {
        return $this->portfolio;
    }

    public function setPortfolio(?string $portfolio): self
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }
/**
 * @ORM\Column(type="json")
 */
private $roles = [];
/**
* A visual identifier that represents this user.
* @see UserInterface
*/
public function getUsername(): string
{
return (string) $this->login;
}
public function getRoles(): array
{
$roles = $this->roles;
// guarantee every user at least has ROLE_USER
$roles[] = 'ROLE_USER';
return array_unique($roles);
}
public function setRoles(array $roles): self
{
$this->roles = $roles;
return $this;
}
/**
* @see PasswordAuthenticatedUserInterface
*/
public function getPassword(): string
{
// à remplacer éventuellement par la propriété contenant le mot de passe
return $this->password;
}
public function setPassword(string $password): self
{
// à remplacer éventuellement par la propriété contenant le mot de passe
$this->password = $password;
return $this;
}
/**
* Returning a salt is only needed, if you are not using a modern
* hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
*
* @see UserInterface
*/
public function getSalt(): ?string
{
return null;
}
/**
* @see UserInterface
*/
public function eraseCredentials()
{
// If you store any temporary, sensitive data on the user, clear it here
// $this->plainPassword = null;
}
}
