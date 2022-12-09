<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['contributions.technologie.nom' => 'ipartial'])]
/**
* Class Membre
 * @package App\Entity
* @ORM\Table(name="`membre`")
* @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
* @ORM\HasLifecycleCallbacks()
*/
class Membre
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $name
     * @ORM\Column(type="string")
     * @Assert\Length(min=2)
     * @Assert\NotNull()
     */
    private $prenom;

    /**
     * @var string $name
     * @ORM\Column(type="string")
     * @Assert\Length(min=2)
     * @Assert\NotNull()
     */
    private $nom;

    /**
     * @var string $email
     * @ORM\Column(type="string")
     * @Assert\Email()
     */
    private $email;

    /**
     * @var Contribution[]|Collection $users
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Contribution",
     *     mappedBy="membre",
     *     cascade={"persist"}
     *  )
     */
    private $contributions;

    public function __construct()
    {
        $this->contributions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Contribution[]|Collection
     */
    public function getContributions()
    {
        return $this->contributions;
    }

    /**
     * @param Contribution $contribution
     * @return $this
     */
    public function addContribution(Contribution $contribution)
    {
        if ($this->contributions->contains($contribution)) {
            return $this;
        }
        $contribution->setMembre($this);
        $this->contributions->add($contribution);
        return $this;
    }

    /**
     * @param Contribution $contribution
     * @return $this
     */
    public function removeContribution(Contribution $contribution)
    {
        if (!$this->contributions->contains($contribution)) {
            return $this;
        }
        $this->contributions->removeElement($contribution);
        return $this;
    }
}