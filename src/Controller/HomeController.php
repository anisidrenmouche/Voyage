<?php

/*
App: espace de nom racine de symfony > composer.json
*/

namespace App\Controller;

/*
App: importation dans un espace de nom
*/

use App\Repository\RegionRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/*
App: classe mere de tous les controleurs de symfony
*/

Class HomeController extends AbstractController

{


/*
L'injection de dependence c'est
-creer une propriete dans la classe
-creer ou modifier le constructeur avec un parametre qui va stocker le service
-dans le constructeur, lier la propriete au parametre
Le service RequestStack permet de recuperer les informations stockees dans la requetes http GET POST SESSION
*/

private RequestStack $requestStack;

private RegionRepository $regionRepository;

public function __construct(RequestStack $requestStack, RegionRepository $regionRepository)
{
    $this->requestStack = $requestStack;
    $this->regionRepository = $regionRepository;
    
}

/** 
 * 
 * @Route("/", name="homepage.index")
 */

 public function index ():Response
 {

  /* return $this->render('homepage/index.html.twig', [
        'nom' => 'Benja',
        'list' => [
            'wigdfgdfglly',
            'Anigdfgdfgs',
            'dfgdfgdfg'
        ],
    ]); */

    

  // dd($this->requestStack->getCurrentRequest()->headers->get('accept-language'));
  // return new Response ('coucou');

  $regions = $this->regionRepository->findAll();
  return $this->render('homepage/index.html.twig', [
      'regions' => $regions
  ]);
}

}



