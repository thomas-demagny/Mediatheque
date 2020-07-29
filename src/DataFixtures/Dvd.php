<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Dvd extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // add DVD
        for ($i = 0; $i < 25; $i++) {
            $dvd = new \App\Entity\Dvd();
            $dvd->setTitle($faker->name);
            $dvd->setStock($faker->randomDigit);
            $dvd->setFormat($faker->randomElement($array = array('video', 'blu-ray', 'blu-ray 3D', '4K')));
            $dvd->setCategory($faker->randomElement(['Horreur','Action', 'Dessin Animé', 'Drame', 'Comédie']));
            $dvd->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $dvd->setDuration($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($dvd);
        }

        $manager->flush();
    }
}
