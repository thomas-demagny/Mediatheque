<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Member extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // add member
        for ($i = 0; $i < 50; $i++) {
            $member = new \App\Entity\Member();

            $member->setUsername($faker->userName);
            $member->setPassword($faker->password);
            $member->setEmail($faker->email);
            $member->setFirstName($faker->firstName($gender = 'male' | 'female'));
            $member->setLastName($faker->lastName);
            $member->setZipCode($faker->numberBetween($min = 10000, $max = 99999));
            $member->setCity($faker->city);
            $member->setAddress($faker->address);
            $member->setMembershipDate($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null));
            $manager->persist( $member);
        }

        $manager->flush();
    }
}
