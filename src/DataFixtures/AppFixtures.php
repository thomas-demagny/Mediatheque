<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;
use Faker;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $book = new Book();
        // $manager->persist($product);

        

        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {
            $books = new Book();
            $books->setCategory($faker->category);
            $books->setStock($faker->stock);
            $books->setTitle($faker->title);
            $books->setFormat($faker->format);
            $books->setProductCode($faker->ProductCode);
            $books->setPages($faker->pages);
            $manager->persist($books);
        }

        $manager->flush();
    }
}
