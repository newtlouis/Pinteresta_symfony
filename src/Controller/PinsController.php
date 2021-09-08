<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PinsController extends AbstractController
{
    #[Route('/pins', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('pins/index.html.twig', [
            'controller_name' => 'PinsController',
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

    #[Route('/pins/12', name: 'pin_show')]
    public function show(): Response
    {
        return $this->render('pins/show.html.twig', [
            'title' => 'Louis',
            'age' => 31
        ]);
    }
}
