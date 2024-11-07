<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChevalController extends AbstractController
{
    #[Route('/cheval', name: 'app_cheval')]
    public function index(): Response
    {
        return $this->render('cheval/index.html.twig', [
            'controller_name' => 'ChevalController',
        ]);
    }
}
