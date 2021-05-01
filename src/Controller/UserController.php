<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditAccountType;
use App\Repository\PropertieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function edit(User $user, Request $request): Response
    {

        $form = $this->createForm(EditAccountType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            $this->addFlash('message', 'Votre compte à été modifié avec succès');

            return $this->redirectToRoute('account', ['id' => $user->getId()]);
        }

        return $this->render('user/account_edit.html.twig', [
            'editAccountForm' => $form->createView(),
            'user' => $user
        ]);
    }

    public function delete(User $user): Response
    {
        if ($user) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();

            $this->addFlash('message', 'Votre compte à été supprimer avec succès');

            return $this->redirectToRoute('home');
        }

        return $this->render('user/account_delete.html.twig', [
            'user' => $user,
        ]);
    }
}
