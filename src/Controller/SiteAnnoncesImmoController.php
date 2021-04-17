<?php

namespace App\Controller;

use App\Entity\Propertie;
use App\Form\PropertieType;
use App\Repository\PropertieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteAnnoncesImmoController extends AbstractController
{
    public function index(PropertieRepository $repo): Response
    {

        //Renvoi de la vue grace à la méthode render()
        return $this->render('site_annonces_immo/index.html.twig', [
            'properties' => $repo->findAll()
        ]);
    }

    public function add(Request $request): Response
    {
        $propertie = new Propertie(); // création objet de type Propertie

        /* création du formulaire par la méthode createForm() de la class AbstractController,
        le 1er paramètre est l'entityType sur lequel est basé le form, ensuite on lui envoie l'objet qui contiendra les données */
        $form = $this->createForm(PropertieType::class, $propertie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $propertie->setUpdatedAt(new \DateTime());

            if ($propertie->getImage() !== null) {
                $file = $form->get('image')->getData();
                $fileName =  uniqid(). '.' .$file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('images_directory'), // Le dossier dans le quel le fichier va etre charger
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $propertie->setImage($fileName);
            }

            if (!$propertie->getCreatedAt()) {
                $propertie->setCreatedAt(new \DateTime());
            }

            $em = $this->getDoctrine()->getManager(); // On récupère l'entity manager
            $em->persist($propertie); // On confie notre entité à l'entity manager (on persist l'entité)
            $em->flush(); // On execute la requete

            return $this->redirectToRoute('home');
        }

        return $this->render('site_annonces_immo/propertie_add.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function show($url): Response
    {
        return $this->render('site_annonces_immo/propertie_show.html.twig', [
            'slug' => $url
        ]);
    }

    public function edit(): Response
    {
        $propertie = new Propertie();

        $form = $this->createForm(PropertieType::class, $propertie);

        return $this->render('site_annonces_immo/propertie_edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function remove(): Response
    {
        return $this->render('site_annonces_immo/propertie_add.html.twig');
    }
}
