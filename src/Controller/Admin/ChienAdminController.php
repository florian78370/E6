<?php

namespace App\Controller\Admin;

use App\Entity\Chien;
use App\Form\ChienType;
use App\Repository\ChienRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChienAdminController extends AbstractController
{
    #[Route('/admin/chiens', name: 'admin_chiens', methods :'GET')]
    public function listeAlbums(ChienRepository $repo,PaginatorInterface $paginator, Request $request)
    {
        $chiens=$paginator->paginate(
        $repo->listeAlbumsCompletePaginee(),
        $request->query->getInt('page', 1), /*page number*/
        8 /*limit per page*/
        );
        return $this->render('admin/chien/listeAlbums.html.twig', [
            'lesChiens' => $chiens
        ]);
    }

    #[Route('/admin/chiens/ajout', name: 'admin_chien_ajout', methods :['GET', 'POST'])]
    #[Route('/admin/chiens/modif/{id}', name: 'admin_chien_modif', methods :['GET', 'POST'])]
    public function ajoutModifAlbum(Chien $chien=null, Request $request, EntityManagerInterface $manager)
    {
        if($chien==null){
            $chien=new Chien();
            $mode="ajouté";
        }else{
            $mode="modifié";
        }

        $form=$this->createForm(ChienType::class,$chien);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($chien);
            $manager->flush();
            $this->addFlash("success", "L'chien a bien été $mode");
            return $this->redirectToRoute('admin_chiens');
        }
        return $this->render('admin/chien/formAjoutModifAlbum.html.twig', [
            'formChien' => $form->createView()
        ]);
    }


    #[Route('/admin/chiens/supression/{id}', name: 'admin_chien_supression', methods :'GET')]
    public function supressionAlbum(Chien $chien, EntityManagerInterface $manager)
    {
            $manager->remove($chien);
            $manager->flush();
            $this->addFlash("success", "Le chien a bien été supprimé");

        return $this->redirectToRoute('admin_chiens');
    }
    
}
