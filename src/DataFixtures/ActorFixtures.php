<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public const ACTORS = [
        'Norman Reedus',
        'Andrew Lincoln',
        'Lauren Cohan',
        'Jeffrey Dean Morgan',
        'Chandler Riggs',

    ];
    public function load(ObjectManager $manager): void
    {
        foreach(self::ACTORS as $key => $actorName) {  

            $actor = new Actor();  
            $actor->setName($actorName);
            $actor->setImage('image');   
            $manager->persist($actor);
            $this->addReference('actor_' . $key, $actor); 
        }  
        $manager->flush();
    }
}
