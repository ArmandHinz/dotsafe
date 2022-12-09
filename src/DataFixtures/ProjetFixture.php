<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Persistence\ObjectManager;
use Exception;

class ProjetFixture extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $nbProjet = ConfigFixture::NB_OF_PROJET;
        for ($i = 0; $i < $nbProjet; $i++) {
            $projet = new Projet();
            $projet->setNom($this->faker->text(5));
            $manager->persist($projet);
        }
        $manager->flush();
        $manager->clear();
    }
}