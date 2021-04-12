<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SiteAnnoncesImmoController extends AbstractController
{
    public function index(): Response
    {
        //Renvoi de la vue grace à la méthode render()
        return $this->render('site_annonces_immo/index.html.twig');
    }

    public function add(): Response
    {
        return $this->render('site_annonces_immo/propertie_add.html.twig');
    }

    public function show($url): Response
    {
        return $this->render('site_annonces_immo/propertie_show.html.twig', [
            'slug' => $url
        ]);
    }

    public function edit(): Response
    {
        return $this->render('site_annonces_immo/propertie_edit.html.twig');
    }

    public function remove(): Response
    {
        return $this->render('site_annonces_immo/propertie_add.html.twig');
    }
}
