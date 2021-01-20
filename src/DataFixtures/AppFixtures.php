<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $product = new Product();
            $product
                ->setName("Produit " . $i)
                ->setDescription($faker->realText(300))
                ->setPrice(rand(100, 6000));
            
            $manager->persist($product);
        }

        $manager->flush();
    }
}
