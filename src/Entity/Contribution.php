<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
/**
* Class Contribution
 * @package App\Entity
* @ORM\Table(name="`contribution`")
* @ORM\Entity(repositoryClass="App\Repository\ContributionRepository")
* @ORM\HasLifecycleCallbacks()
*/
class Contribution
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Membre $membre
     * @ORM\ManyToOne(targetEntity="App\Entity\Membre", inversedBy="contributions",
     *     cascade={"persist"})
     * @Assert\NotNull
     */
    private $membre;

    /**
     * @var Projet $projet
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="contributions")
     */
    private $projet;

    /**
     * @var Technologie $technologie
     * @ORM\ManyToOne(targetEntity="App\Entity\Technologie", inversedBy="contributions")
     */
    private $technologie;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contribution
     */
    public function setId(int $id): Contribution
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Membre
     */
    public function getMembre(): Membre
    {
        return $this->membre;
    }

    /**
     * @param Membre $membre
     * @return Contribution
     */
    public function setMembre(Membre $membre): Contribution
    {
        $this->membre = $membre;
        return $this;
    }

    /**
     * @return Projet
     */
    public function getProjet(): Projet
    {
        return $this->projet;
    }

    /**
     * @param Projet $projet
     * @return Contribution
     */
    public function setProjet(Projet $projet): Contribution
    {
        $this->projet = $projet;
        return $this;
    }

    /**
     * @return Technologie
     */
    public function getTechnologie(): Technologie
    {
        return $this->technologie;
    }

    /**
     * @param Technologie $technologie
     * @return Contribution
     */
    public function setTechnologie(Technologie $technologie): Contribution
    {
        $this->technologie = $technologie;
        return $this;
    }
}