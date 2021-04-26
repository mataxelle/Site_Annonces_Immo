<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Propertie;
use App\Repository\UserRepository;
use App\Repository\PropertieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    
    public function index(User $user, PropertieRepository $propertieRepo): Response
    {
        $properties = $propertieRepo->findBy(
            [],
            ['updatedAt' => 'DESC']
        );

        return $this->render('user/index.html.twig', [
            'user' => $user,
            'properties' => $properties
        ]);
    }

    public function edit(User $user): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }

    public function remove(User $user): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }
}
