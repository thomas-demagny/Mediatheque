<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Ebook extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        // add Ebook
        for ($i = 0; $i < 100; $i++) {
            $eBook = new \App\Entity\Ebook();
            $eBook->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $eBook->setStock($faker->randomDigit);
            $eBook->setFormat($faker->randomElement($array = array('Tablette', 'SmartPhone')));
            $eBook->setCategory($faker->randomElement(['Suspense','Polar', 'Romance', 'Roman du terroir', 'Enfant']));
            $eBook->setTitle($faker->title);
            $eBook->setPages($faker->numberBetween($min = 20, $max = 500));

            $manager->persist($eBook);
        }

        $manager->flush();
    }
}
