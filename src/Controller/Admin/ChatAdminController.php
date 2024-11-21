<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    #[Route('/admin/chat', name: 'app_admin_chat')]
    public function index(): Response
    {
        return $this->render('admin/chat/index.html.twig', [
            'controller_name' => 'ChatController',
        ]);
    }
}
