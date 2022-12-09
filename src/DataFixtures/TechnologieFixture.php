<?php

namespace App\DataFixtures;

use App\Contract\Manager\ProjetManagerInterface;
use App\Entity\Technologie;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker\Generator;

class TechnologieFixture extends AbstractFixture  implements DependentFixtureInterface
{
    private ProjetManagerInterface $projetManager;

    public function __construct(Generator $faker, ProjetManagerInterface $projetManager)
    {
        parent::__construct($faker);
        $this->projetManager = $projetManager;
    }

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $nb = ConfigFixture::NB_OF_TECHNOLOGIE;
        $projets = $this->projetManager->findAll();
        for ($i = 0; $i < $nb; $i++) {
            $technologie = new Technologie();
            $technologie->setNom($this->faker->text(8));
            $technologie->addProjet($projets[$this->faker->numberBetween(0,19)]);
            $manager->persist($technologie);
        }
        $manager->flush();
        $manager->clear();
    }

    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return array(ProjetFixture::class);
    }
}