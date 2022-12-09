<?php

namespace App\DataFixtures;

use App\Contract\Manager\MembreManagerInterface;
use App\Contract\Manager\ProjetManagerInterface;
use App\Contract\Manager\TechnologieManagerInterface;
use App\Entity\Contribution;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Generator;

class ContributionFixture extends AbstractFixture implements DependentFixtureInterface
{
    /**
     * @var ProjetManagerInterface
     */
    private ProjetManagerInterface $projetManager;
    /**
     * @var MembreManagerInterface
     */
    private MembreManagerInterface $membreManager;
    /**
     * @var TechnologieManagerInterface
     */
    private TechnologieManagerInterface $technologieManager;

    public function __construct(
        ProjetManagerInterface $projetManager,
        MembreManagerInterface $membreManager,
        TechnologieManagerInterface $technologieManager,
        Generator $faker
    ) {
        parent::__construct($faker);
        $this->projetManager = $projetManager;
        $this->membreManager = $membreManager;
        $this->technologieManager = $technologieManager;
    }

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $nb = ConfigFixture::NB_OF_CONTRIBUTION;
        $membres = $this->membreManager->findAll();
        $projets = $this->projetManager->findAll();
        $technologies = $this->technologieManager->findAll();

        for ($i = 0; $i < $nb; $i++) {
            $contribution = new Contribution();
            $contribution->setTechnologie($technologies[$this->faker->numberBetween(0,19)]);
            $contribution->setProjet($projets[$this->faker->numberBetween(0,19)]);
            $contribution->setMembre($membres[$this->faker->numberBetween(0,19)]);
            $manager->persist($contribution);
        }
        $manager->flush();
        $manager->clear();
    }


    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return array(MembreFixture::class, TechnologieFixture::class, ProjetFixture::class);
    }
}