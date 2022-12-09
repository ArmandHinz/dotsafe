<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
/**
* Class Technologie
 * @package App\Entity
* @ORM\Table(name="`technologie`")
* @ORM\Entity(repositoryClass="App\Repository\TechnologieRepository")
* @ORM\HasLifecycleCallbacks()
*/
class Technologie
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
    private $nom;

    /**
     * @var Contribution[]|Collection
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Contribution",
     *     mappedBy="technologie"
     * )
     */
    private $contributions;

    /**
     * @var Projet[]|Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\Projet", inversedBy="technologies")
     * @JoinTable(name="technologies_projets",
     *     joinColumns={@ORM\JoinColumn(name="technologie_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="projet_id", referencedColumnName="id")}
     * )
     */
    private $projets;

    public function __construct()
    {
        $this->contributions = new ArrayCollection();
        $this->projets = new ArrayCollection();
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
     * @return Technologie
     */
    public function setId(int $id): Technologie
    {
        $this->id = $id;
        return $this;
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
     * @return Technologie
     */
    public function setNom(string $nom): Technologie
    {
        $this->nom = $nom;
        return $this;
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
        $contribution->setTechnologie($this);
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

    /**
     * @return Projet[]|Collection
     */
    public function getProjets()
    {
        return $this->projets;
    }

    /**
     * @param Projet $projet
     * @return $this
     */
    public function addProjet(Projet $projet)
    {
        if ($this->projets->contains($projet)) {
            return $this;
        }
        $this->projets->add($projet);
        return $this;
    }

    /**
     * @param Projet $projet
     * @return $this
     */
    public function removeProjets(Projet $projet)
    {
        if (!$this->projets->contains($projet)) {
            return $this;
        }
        $this->projets->removeElement($projet);
        return $this;
    }
}