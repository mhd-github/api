<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 5; $i++) {
            $departement = new Departement();
            $departement->setName('departement ' . $i);
            $departement->setCapacity(mt_rand(10, 50));

            $manager->persist($departement);

            for ($j = 0; $j < 20; $j++) {
                $student = new Student();
                $student->setFirstName('student ' . $j);
                $student->setLastName('last ' . $j);
                $student->setNumEtud(mt_rand(10, 1000000));
                $student->setDepartement($departement);

                $manager->persist($student);
            }
        }

        $manager->flush();
    }
}
