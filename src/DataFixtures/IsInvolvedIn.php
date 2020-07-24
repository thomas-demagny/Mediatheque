<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Creator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;
class IsInvolvedIn extends Fixture
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->manager = $entity;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $repoProduct = $this->manager->getRepository(Product::class);
        $repoCreator= $this->manager->getRepository(Creator::class);


        for ($i = 0; $i < 100; $i++) {


            $isInvolvedIn = new \App\Entity\IsInvolvedIn();

            $isInvolvedIn->setProduct($repoProduct->find($faker->numberBetween($min = 1, $max = 100)));

            switch (get_class($isInvolvedIn->getProduct())) {
                case "App\Entity\DVD":
                    $isInvolvedIn->setRole($faker->randomElement($array = array('acteur', 'producteur', 'scénariste', 'réalisateur')));
                    break;
                case "App\Entity\CD":
                    $isInvolvedIn->setRole($faker->randomElement($array = array('chanteur', 'compositeur', 'musicien')));
                    break;
                case "App\Entity\Journal":
                    $isInvolvedIn->setRole($faker->randomElement($array = array('rédacteur', 'producteur')));
                    break;
                case "App\Entity\Book":
                    $isInvolvedIn->setRole($faker->randomElement($array = array('éditeur', 'illustrateur', 'auteur')));
                    break;
                case "App\Entity\EBook":
                    $isInvolvedIn->setRole($faker->randomElement($array = array('narrateur', 'auteur', 'illustrateur')));
                    break;
            }
            $isInvolvedIn->setCreator($repoCreator->find($faker->numberBetween($min = 1, $max = 100)));
            $manager->persist($isInvolvedIn);
    }
        $manager->flush();
    }
}
