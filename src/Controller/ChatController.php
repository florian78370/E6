<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Repository\ChatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'chats')]

    public function ListesChats(ChatRepository $repo)
    {
        $repo->listeChatsComplete();/* query NOT result */
        return $this->render('chat/index.html.twig', [
            'lesChats' => $chat,
        ]);
    }

    #[Route("/chat/{id}", name: 'ficheChat', methods :'GET')]
    public function ficheChats(Chat $chat)
    {
        return $this->render('chat/ficheChat.html.twig', [
            'leChat' => $chat
        ]);
    }
    #[Route("/chat/{id}", name: 'ficheChat', methods :'GET')]
    public function ficheChats(Chat $chat) : Response
    {
        return $this->render('artiste/ficheChat.html.twig', [
            'leChat' => $chat
        ]);
    }
}
