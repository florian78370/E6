<?php

namespace App\Controller\Admin;

use App\Entity\Cheval;
use App\Form\ChevalType;
use App\Repository\ChevalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChevalAdminController extends AbstractController
{
    #[Route('/admin/chevaux', name: 'admin_chevaux', methods :'GET')]
    public function listeAlbums(ChevalRepository $repo,PaginatorInterface $paginator, Request $request)
    {
        $chevaux=$paginator->paginate(
        $repo->listeAlbumsCompletePaginee(),
        $request->query->getInt('page', 1), /*page number*/
        8 /*limit per page*/
        );
        return $this->render('admin/cheval/listeAlbums.html.twig', [
            'lesChevaux' => $chevaux
        ]);
    }

    #[Route('/admin/chevaux/ajout', name: 'admin_cheval_ajout', methods :['GET', 'POST'])]
    #[Route('/admin/chevaux/modif/{id}', name: 'admin_cheval_modif', methods :['GET', 'POST'])]
    public function ajoutModifAlbum(Cheval $cheval=null, Request $request, EntityManagerInterface $manager)
    {
        if($cheval==null){
            $cheval=new Cheval();
            $mode="ajouté";
        }else{
            $mode="modifié";
        }

        $form=$this->createForm(ChevalType::class,$cheval);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $manager->persist($cheval);
            $manager->flush();
            $this->addFlash("success", "Le cheval a bien été $mode");
            return $this->redirectToRoute('admin_chevaux');
        }
        return $this->render('admin/cheval/formAjoutModifChevaux.html.twig', [
            'formChevaux' => $form->createView()
        ]);
    }


    #[Route('/admin/chevaux/supression/{id}', name: 'admin_cheval_supression', methods :'GET')]
    public function supressionAlbum(Cheval $cheval, EntityManagerInterface $manager)
    {
            $manager->remove($cheval);
            $manager->flush();
            $this->addFlash("success", "Le cheval a bien été supprimé");

        return $this->redirectToRoute('admin_chevaux');
    }
    
}
