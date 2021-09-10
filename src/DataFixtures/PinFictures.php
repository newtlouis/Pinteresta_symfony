<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Pin;
use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PinFictures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $content =" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ratione maxime consequatur beatae rerum, dolores magnam consectetur perspiciatis excepturi dolor voluptatem odit, veniam repellendus at quisquam ullam quo totam inventore?";
        $description = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus, reprehenderit.";
        
        for ($i = 1; $i <3; $i++){
            $category = new Category();
            $category -> setTitle("catégorie $i")
                    -> setDescription($content);

            $manager->persist($category); 

            for ($j = 1; $j <3; $j++){
                $pin = new Pin();
                $pin -> setTitle("Article")
                        -> setContent("<p> $content <?/>")
                        -> setimage($faker->imageUrl())
                        -> setCreatedAt(new \DateTimeImmutable())
                        ->setCategory($category);

    
                $manager->persist($pin); 

                for ($k = 1; $k <3; $k++){
                    $comment = new Comment();
                    $comment -> setAuthor("Louis MICHEL")
                            -> setContent("<p> $$description <?/>")
                            -> setCreatedAt(new \DateTimeImmutable())
                            ->setPin($pin);

        
                    $manager->persist($comment); 
                }
            }
        }

        $manager->flush();
    }
}
