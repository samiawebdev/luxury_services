<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JobController extends AbstractController
{
    #[Route('/jobs', name: 'app_jobs')]
    public function index(OfferRepository $offerRepository, CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository -> findAll();
        $offers = $offerRepository -> findAll();
        

        return $this->render('jobs/index.html.twig', [
            'offers' => $offers,
            'categories' => $categories,
        ]);
    }



    #[Route('/jobs/show', name: 'app_show')]
    public function show(): Response
    {
        return $this->render('jobs/show.html.twig', [
           
        ]);
    }

    
}
