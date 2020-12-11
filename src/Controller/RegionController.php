<?php

namespace App\Controller;

use App\Repository\RegionRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

Class RegionController extends AbstractController

{
    private RegionRepository $regionRepository;

    public function __construct(RegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
        
    }

/**
 *@Route("/region/{slug}", name="region.index") 
 */

 public function index(string $slug): Response{

    $region =$this->regionRepository->findOneBy([
        'slug' => $slug
    ]);

    return $this->render('region/index.html.twig', [
        'region' => $region
    ]);
 }
    
}





