<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChevalAdminController extends AbstractController
{
    #[Route('/admin/cheval/admin', name: 'app_admin_cheval_admin')]
    public function index(): Response
    {
        return $this->render('admin/cheval_admin/index.html.twig', [
            'controller_name' => 'ChevalAdminController',
        ]);
    }
}
