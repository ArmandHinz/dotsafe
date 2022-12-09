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
#[ApiFilter(SearchFilter::class, properties: ['technologies.nom' => 'ipartial', 'contributions.membre.email' => 'ipartial'])]
//#[ApiFilter(SearchFilter::class, properties: ['contributions.membre.email' => 'ipartial'])]
/**
* Class Projet
 * @package App\Entity
* @ORM\Table(name="`projet`")
* @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
* @ORM\HasLifecycleCallbacks()
*/
class Projet
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
     *     mappedBy="projet"
     * )
     */
    private $contributions;

    /**
     * @var Technologie[]|Collection
     * @ORM\ManyToMany(
     *     targetEntity="App\Entity\Technologie",
     *     mappedBy="projets", cascade={"persist"}
     * )
     *
     */
    private $technologies;

    public function __construct()
    {
        $this->contributions = new ArrayCollection();
        $this->technologies = new ArrayCollection();
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
     * @return Projet
     */
    public function setId(int $id): Projet
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
     * @return Projet
     */
    public function setNom(string $nom): Projet
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
        $contribution->setProjet($this);
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
     * @return Technologie[]|Collection
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * @param Technologie $technologie
     * @return $this
     */
    public function addTechnologie(Technologie $technologie)
    {
        if ($this->technologies->contains($technologie)) {
            return $this;
        }
        $this->technologies->add($technologie);
        return $this;
    }

    /**
     * @param Technologie $technologie
     * @return $this
     */
    public function removeTechnologie(Technologie $technologie)
    {
        if (!$this->technologies->contains($technologie)) {
            return $this;
        }
        $this->technologies->removeElement($technologie);
        return $this;
    }
}