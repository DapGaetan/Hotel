<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Suite;
use App\Entity\Hotel;
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
        for ($i=0; $i < 20; $i++) {

            $suite = new Suite();
            $suite->setTitre($this->faker->word())
                ->setDescription('patati, patata')
                ->setPrix(200)
                ->setImage(20)
                ->setGalerieImage(20);

                $suites[] = $suite;
                $manager->persist($suite);
        }
        for ($j=0; $j < 5; $j++) {

            $hotel = new Hotel();
            $hotel->setNomHotel($this->faker->word())
                ->setAdresseHotel('');

            for ($k=0; $k < mt_rand(5, 15); $k++) { 
                $hotel->addSuite($suites[mt_rand(0, count($suites) - 1)]);
            }
            $manager->persist($hotel);
        }

        $manager->flush();
    }
}
