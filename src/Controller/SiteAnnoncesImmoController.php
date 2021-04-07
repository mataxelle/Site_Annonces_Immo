<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteAnnoncesImmoController extends AbstractController
{
    /**
     * Page d'accueil
     * 
     * @Route("/")
     */
    public function index(): Response
    {
        //Renvoi de la vue grace à la méthode render()
        return $this->render('site_annonces_immo/index.html.twig');
    }
}
