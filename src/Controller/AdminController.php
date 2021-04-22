<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Propertie;
use App\Form\PropertieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    public function admin(): Response
    {

        $properties = $this->getDoctrine()->getRepository(Propertie::class)->findBy(
            [],
            ['updatedAt' => 'DESC']
        );

        return $this->render('admin/index.html.twig', [
            'properties' => $properties
        ]);
    }
}
