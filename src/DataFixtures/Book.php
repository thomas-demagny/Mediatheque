<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class Book extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        //Add Book
        for ($i = 0; $i < 100; $i++) {
            $book = new \App\Entity\Book();
            $book->setProductCode($faker->randomDigit);
            $book->setStock($faker->numberBetween($min = 20, $max = 500));
            $book->setFormat($faker->randomElement($array = array('poche', 'relié')));
            $book->setCategory($faker->randomElement(['Suspense','Polar', 'Romance', 'Roman du terroir', 'Enfant']));
            $book->setTitle($faker->title);
            $book->setPages($faker->numberBetween($min = 20, $max = 500));

            $manager->persist($book);
        $manager->flush();
    }


}
}
