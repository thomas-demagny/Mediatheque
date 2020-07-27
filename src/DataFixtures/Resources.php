<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class Resources extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
// Add resources
        for ($i = 0; $i < 100; $i++) {
            $resources = new \App\Entity\Resources();
            $resources->setUrl($faker->url);
            $resources->setType($faker->randomElement($array = array('article', 'video', 'film')));

            $manager->persist($resources);

        }
        $manager->flush();
    }
}
