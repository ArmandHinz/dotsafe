<?php

namespace App\DataFixtures;

use App\Entity\Membre;
use Doctrine\Persistence\ObjectManager;
use Exception;

class MembreFixture extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $nb = ConfigFixture::NB_OF_MEMBRE;

        for ($i = 0; $i < $nb; $i++) {
            $membre = new Membre();
            $membre->setEmail($this->faker->safeEmail);
            $membre->setNom($this->faker->text(6));
            $membre->setPrenom($this->faker->text(9));
            $manager->persist($membre);
        }
        $manager->flush();
        $manager->clear();
    }
}