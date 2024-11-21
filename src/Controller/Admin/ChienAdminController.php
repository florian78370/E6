<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChienAdminController extends AbstractController
{
    #[Route('/admin/chien/admin', name: 'app_admin_chien_admin')]
    public function index(): Response
    {
        return $this->render('admin/chien_admin/index.html.twig', [
            'controller_name' => 'ChienAdminController',
        ]);
    }
}
