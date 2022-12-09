<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use Doctrine\Bundle\FixturesBundle\Fixture;

abstract class AbstractFixture extends Fixture
{

    /**
     * @var Generator
     */
    protected Generator $faker;

    public function __construct(Generator $faker)
    {
        $this->faker = Factory::create('fr_FR');
    }
}
