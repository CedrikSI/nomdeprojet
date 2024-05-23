<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker=Factory::create("fr_FR");
        $genres=["male","female"];
        
            
        for($i=0; $i <100 ;$i++) {
        $contact=new Contact();
        $sexe=mt_rand(0,1);
        if ($sexe == 0){
            $type="men"; 
        }
        else {
            $type="women";
        }
        $contact->setNom($faker->lastname())
                ->setPrenom($faker->firstName($genres[mt_rand(0,1)]))
                ->setRue($faker->streetAddress())
                ->setCp($faker->numberBetween(75000,92000))
                ->setSexe($sexe)
                ->setVille($faker->city())
                ->setMail($faker->email())
                ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg");
            $manager->persist($contact);
        } 
        $manager->flush();
    }
}
    