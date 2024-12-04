<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class User extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create("fr_FR");

            $user= new User();
            $user       ->setNom($faker->lastName())
                        ->setNom($faker->firstname())
                        ->setMail($faker->email());
            $manager->persist($user);
            $manager->flush();
    }

}
