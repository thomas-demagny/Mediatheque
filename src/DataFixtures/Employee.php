<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Employee extends Fixture
{
    public function load(ObjectManager $manager)
    {$faker = Faker\Factory::create('fr_FR');


        // add employee
        for ($i = 0; $i < 50; $i++) {
            $employee = new \App\Entity\Employee();
            $employee->setNickName($faker->userName);
            $employee->setFirstName($faker->firstName($gender = 'male' | 'female'));
            $employee->setLastName($faker->lastName);
            $employee->setPasswd($faker->password);
            $manager->persist($employee);
        }
        $manager->flush();

    }
}
