<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class AudioBook extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {

            $audioBook = new \App\Entity\AudioBook();
            $audioBook->setProductCode($faker->numberBetween($min = 20, $max = 500));
            $audioBook->setStock($faker->randomDigit);
            $audioBook->setFormat($faker->randomElement($array = array('audio')));
            $audioBook->setCategory($faker->randomElement(['Suspense','Polar', 'Romance', 'Roman du terroir', 'Enfant']));
            $audioBook->setTitle($faker->title);
            $audioBook->setDuration($faker->dateTime());

            $manager->persist($audioBook);
        }
        $manager->flush();


    }
}
