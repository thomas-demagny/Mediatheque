<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Journal extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // add journal
        for ($i = 0; $i < 25; $i++) {
            $journal = new \App\Entity\Journal();
            $journal->setTitle($faker->name);
            $journal->setStock($faker->randomDigit);
            $journal->setFormat($faker->randomElement($array = array('papier')));
            $journal->setCategory($faker->randomElement(['mode','sport', 'économie', 'presse', 'presse internationale']));
            $journal->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $journal->setPeriodicity($faker->randomElement($array = array('1 jour', '1 semaine', '1 mois')));
            $journal->setSubscriptionDate($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($journal);
        }
        $manager->flush();
    }
}
