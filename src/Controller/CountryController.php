<?php

namespace App\Controller;


use App\Repository\CountryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

Class CountryController extends AbstractController

{
    private CountryRepository $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
        
    }


/**
 *@Route("/country/{slug}", name="country.index") 
 */

public function index(string $slug): Response{

    $country =$this->countryRepository->findOneBy([
        'slug' => $slug
    ]);

    return $this->render('country/index.html.twig', [
        'country' => $country
    ]);
 }
 
/**
 *@Route("/countrys", name="country.countrys") 
 */

public function countrys(): Response{

    $country =$this->countryRepository->findAll();

    return $this->render('country/country.html.twig', [
        'countrys' => $country
    ]);
 }
    
};

