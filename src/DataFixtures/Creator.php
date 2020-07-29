<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class Creator extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        //add creator
        for ($i = 0; $i < 100; $i++) {
            $creator = new \App\Entity\Creator();
            $creator->setFirstName($faker->firstName($gender = 'male' | 'female'));
            $creator->setLastName($faker->lastName);
            $creator->setBirthDate($faker->dateTime($min = '1600', $timezone = null));
            $creator->setDeathDate($faker->dateTime($min = '1700', $timezone = null));
            $manager->persist($creator);
        }

        $manager->flush();
    }
}
