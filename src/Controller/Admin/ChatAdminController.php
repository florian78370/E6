<?php

namespace App\Controller\Admin;

use App\Entity\Chat;
use App\Form\ChatType;
use App\Repository\ChatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChatAdminController extends AbstractController
{
    #[Route('/admin/chats', name: 'admin_chats', methods :'GET')]
    public function listeChats(ChatRepository $repo, PaginatorInterface $paginator, Request $request)
    {
        $chats=$paginator->paginate(
        $repo->listeAlbumsCompletePaginee(),
        $request->query->getInt('page', 1), /*page number*/
        8 /*limit per page*/
        );
        return $this->render('admin/chat/listeAlbums.html.twig', [
            'lesChats' => $chats
        ]);
    }

    #[Route('/admin/chats/ajout', name: 'admin_chat_ajout', methods :['GET', 'POST'])]
    #[Route('/admin/chats/modif/{id}', name: 'admin_chat_modif', methods :['GET', 'POST'])]
    public function ajoutModifAlbum(Chat $album=null, Request $request, EntityManagerInterface $manager)
    {
        if($chat==null){
            $chat=new Chat();
            $mode="ajouté";
        }else{
            $mode="modifié";
        }

        $form=$this->createForm(ChatType::class,$album);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($chat);
            $manager->flush();
            $this->addFlash("success", "Le chat a bien été $mode");
            return $this->redirectToRoute('admin_chats');
        }
        return $this->render('admin/chat/formAjoutModifChat.html.twig', [
            'formChat' => $form->createView()
        ]);
    }


    #[Route('/admin/chats/supression/{id}', name: 'admin_chat_supression', methods :'GET')]
    public function supressionChat(Chat $chat, EntityManagerInterface $manager)
    {
            $manager->remove($chat);
            $manager->flush();
            $this->addFlash("success", "Le produit a bien été supprimé");
        return $this->redirectToRoute('admin_chats');
    }
    
}
