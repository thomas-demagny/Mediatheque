<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\AudioBook;
use App\Entity\Book;
use App\Entity\Ebook;
use App\Entity\Cd;
use App\Entity\Dvd;
use App\Entity\Employee;
use App\Entity\Journal;
use App\Entity\Maintenance;
use App\Entity\MeetUp;
use App\Entity\Member;
use App\Entity\Creator;
use App\Entity\IsInvolvedIn;
use App\Entity\Product;
use App\Entity\User;



class AppFixtures extends Fixture
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $productRepository = $this->manager->getRepository(Product::class);
        $creatorRepository = $this->manager->getRepository(Creator::class);


        // Création d'audioBook
        for ($i = 0; $i < 100; $i++) {
            $faker->addProvider(new \Faker\Provider\Book($faker));
            $audioBook = new AudioBook();
            $audioBook->setProductCode($faker->numberBetween($min = 20, $max = 500));
            $audioBook->setStock($faker->randomDigit);
            $audioBook->setFormat($faker->randomElement($array = array('audio')));
            $audioBook->setCategory($faker->randomElement(['Suspense','Polar', 'Romance', 'Roman du terroir', 'Enfant']));
            $audioBook->setTitle($faker->title);
            $audioBook->setDuration($faker->dateTime());

            $manager->persist($audioBook);
        }
        $manager->flush();

//Add Book
        for ($i = 0; $i < 100; $i++) {
            $book = new Book();
            $book->setProductCode($faker->randomDigit);
            $book->setStock($faker->numberBetween($min = 20, $max = 500));
            $book->setFormat($faker->randomElement($array = array('poche', 'relié')));
            $book->setCategory($faker->randomElement(['Suspense','Polar', 'Romance', 'Roman du terroir', 'Enfant']));
            $book->setTitle($faker->title);
            $book->setPages($faker->numberBetween($min = 20, $max = 500));

            $manager->persist($book);
        }
        $manager->flush();

// add Ebook
        for ($i = 0; $i < 100; $i++) {
            $eBook = new EBook();
            $eBook->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $eBook->setStock($faker->randomDigit);
            $eBook->setFormat($faker->randomElement($array = array('Tablette', 'SmartPhone')));
            $eBook->setCategory($faker->randomElement(['Suspense','Polar', 'Romance', 'Roman du terroir', 'Enfant']));
            $eBook->setTitle($faker->title);
            $eBook->setPages($faker->numberBetween($min = 20, $max = 500));

            $manager->persist($eBook);
        }
        $manager->flush();


//Add Cd

        for ($i = 0; $i < 100; $i++) {
            $cd = new Cd();
            $cd->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $cd->setStock($faker->randomDigit);
            $cd->setFormat($faker->randomElement($array = array('audio', 'double cd')));
            $cd->setCategory($faker->randomElement(['Hip Hop','Techno', 'Dance', 'Bal Musette', 'Comptines']));
            $cd->setTitle($faker->name);
            $cd->setPlages($faker->numberBetween($min = 1, $max = 100));
            $cd->setDuration($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($cd);
        }
        $manager->flush();




        // add journal
        for ($i = 0; $i < 25; $i++) {
            $journal = new Journal();
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

        // add DVD
        for ($i = 0; $i < 25; $i++) {
            $dvd = new DVD();
            $dvd->setTitle($faker->name);
            $dvd->setStock($faker->randomDigit);
            $dvd->setFormat($faker->randomElement($array = array('video', 'blu-ray', 'blu-ray 3D', '4K')));
            $dvd->setCategory($faker->randomElement(['Horreur','Action', 'Dessin Animé', 'Drame', 'Comédie']));
            $dvd->setProductCode($faker->randomNumber($nbDigits = NULL, $strict = false));
            $dvd->setDuration($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($dvd);
        }
        $manager->flush();

        //add creator
        for ($i = 0; $i < 25; $i++) {
            $creator = new Creator();
            $creator->setFirstName($faker->firstName($gender = 'male' | 'female'));
            $creator->setLastName($faker->lastName);
            $creator->setBirthDate($faker->dateTime);
                $creator->setDeathDate($faker->dateTime($max = 'now', $timezone = null));
            $manager->persist($creator);
        }
        $manager->flush();

        // add member
        for ($i = 0; $i < 50; $i++) {
            $member = new Member();

            $member->setNickName($faker->userName);
            $member->setPasswd($faker->password);
            $member->setFirstName($faker->firstName($gender = 'male' | 'female'));
            $member->setLastName($faker->lastName);
            $member->setZipCode($faker->numberBetween($min = 10000, $max = 99999));
            $member->setCity($faker->city);
            $member->setAddress($faker->address);
            $member->setMembershipDate($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null));
            $manager->persist( $member);
        }
        $manager->flush();

        // add employee
        for ($i = 0; $i < 50; $i++) {
            $employee = new Employee();
            $employee->setNickName($faker->userName);
            $employee->setFirstName($faker->firstName($gender = 'male' | 'female'));
            $employee->setLastName($faker->lastName);
            $employee->setPasswd($faker->password);
            $manager->persist($employee);
        }
        $manager->flush();


// IsInvolvedIn

        $ProductRepository = $this->manager->getRepository(Product::class);
        for ($i = 0; $i < 50; $i++) {
            $isInvolvedIn = new IsInvolvedIn();

            $id = $min;
            $isInvolvedIn->setProduct($productRepository->find($faker->numberBetween($id ,$max = 10000)));

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
                    $isInvolvedIn->setRole($faker->randomElement($array = array('narrateur', 'auteur')));
                    break;
                case "App\Entity\AudioBook":
                    $isInvolvedIn->setRole($faker->randomElement($array = array('acteur', 'producteur', 'scénariste', 'réalisateur')));
            }
            $isInvolvedIn->setCreator($creatorRepository->find($faker->numberBetween($min = 10, $max = 10000)));
            $manager->persist($isInvolvedIn);
        }
        $manager->flush();

        //Maintenance
        for ($i = 0; $i < 100; $i++) {
            $maintenance = new Maintenance();
            $maintenance->setStatus($faker->randomElement($array = array('à changer', 'endommagé', 'correct', 'neuf')));
            $maintenance->setMaintenanceDate($faker->dateTimeBetween($startDate = '- 2 years', $endDate = 'now', $timezone = null));
            $maintenance->setEmployee($employeeRep->find($faker->numberBetween($min = 101, $max = 200)));
            $maintenance->setProduct($productRepository->find($faker->numberBetween($min = 250, $max = 500)));
            $manager->persist($maintenance);
        }
        $manager->flush();















    }
}
