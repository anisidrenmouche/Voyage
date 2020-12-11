<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Container4w0To83\getResponseService;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\String\Slugger\SluggerInterface;


/**
 * 
 */

    
class CountryFixtures extends Fixture implements OrderedFixtureInterface{
    
        private SluggerInterface $sluger;
    
        public function __construct(SluggerInterface $slluger)
    
        {
            $this->sluger = $slluger;
        }

        public function getOrder():array
        {
            return [
                RegionFixtures::class
            ];
            
        }



        public function load(ObjectManager $manager)
        {
            // $product = new Product();
            // $manager->persist($product);
    
            foreach(FixturesData::DATA as $region => $countries){
                foreach($countries as $country){
                $entity = new Country();
                $entity->setName($country ['name']);
                $entity->setDescription($country ['description']);
                $entity->setPoster($country ['poster']);
                $entity->setSlug($this->sluger->slug($country ['name']));

                $entity->setRegion($this->getReference($region));
    
    
                $manager->persist($entity);
    
            }
    
            $manager->flush();
        }
    }
    }