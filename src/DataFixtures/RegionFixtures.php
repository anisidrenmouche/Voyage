<?php

namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class RegionFixtures extends Fixture
{
   

    private SluggerInterface $sluger;

    public function __construct(SluggerInterface $slluger)

    {
        $this->sluger = $slluger;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        foreach(FixturesData::DATA as $key => $value){
            $region = new Region();
            $region->setName($key);
            $region->setSlug($this->sluger->slug($key));

            $this->addReference($key, $region);
    
            $manager->persist($region);

        }

        $manager->flush();
    }
}
