<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Repository\PinRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    #[Route('/pins', name: 'pins')]
    public function index(PinRepository $repo): Response
    {
        // $repo = $this->getDoctrine()->getRepository(Pin::class);
        $pins = $repo->findAll();

        return $this->render('pins/index.html.twig', [
            'controller_name' => 'PinsController',
            'pins' => $pins,
        ]);
    }

    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('pins/home.html.twig', [
            'title' => 'Louis',
            'age' => 31
        ]);
    }

    #[Route('/pins/new', name: 'pin_create')]
    public function create(): Response
    {
        $pin = new Pin();

        $form = $this->createFormbuilder($pin)
            ->add('title')
            ->add('content')
            ->add('image')
            ->getForm();

        return $this->render('pins/create.html.twig', [
            'formPin' => $form->createView()
        ]);
    }

    #[Route('/pins/{id}', name: 'pin_show')]
    public function show(Pin $pin): Response
    {
        return $this->render('pins/show.html.twig', [
            'pin' => $pin
        ]);
    }
}
