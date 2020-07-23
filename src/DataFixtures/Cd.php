<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Cd extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        //Add Cd

        for ($i = 0; $i < 100; $i++) {
            $cd = new \App\Entity\Cd();
            $cd->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $cd->setStock($faker->randomDigit);
            $cd->setFormat($faker->randomElement($array = array('audio', 'double cd')));
            $cd->setCategory($faker->randomElement(['Hip Hop','Techno', 'Dance', 'Bal Musette', 'Comptines']));
            $cd->setTitle($faker->name);
            $cd->setPlages($faker->numberBetween($min = 1, $max = 100));
            $cd->setDuration($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($cd);
        }

        $manager->flush();
    }
}
