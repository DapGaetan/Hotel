<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Suite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 50; $i++) {

            $suite = new Suite();
            $suite->setTitre($this->faker->word())
                ->setDescription('patati, patata')
                ->setPrix(200)
                ->setImage(20)
                ->setGalerieImage(20);

                $manager->persist($suite);
        }
        
        $manager->flush();
    }
}
