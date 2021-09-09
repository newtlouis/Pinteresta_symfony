<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Repository\PinRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    #[Route('/pins', name: 'app_home')]
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

    #[Route('/pins/{id}', name: 'pin_show')]
    public function show(Pin $pin): Response
    {
        return $this->render('pins/show.html.twig', [
            'pin' => $pin
        ]);
    }
}
