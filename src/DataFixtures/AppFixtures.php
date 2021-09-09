<?php

namespace App\DataFixtures;

use App\Entity\Pin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <10; $i++){
            $article = new Pin();
            $article -> setTitle("Titre de l'article $i")
                    -> setContent("<p> contenu <?/>")
                    -> setimage("http://placehold.it/350x150")
                    -> setCreatedAt(new \DateTimeImmutable());

            $manager->persist($article); 
        }

        $manager->flush();
    }
}
