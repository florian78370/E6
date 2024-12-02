<?php

namespace App\Form;

use App\Entity\Chat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
            'mapped'=>false, 
            'required'=>false, 
            'label'=> "Metter l'image"
            ])
            ->add('image')
            ->add('nom', TextType::class,[
            'label'=> "Nom du produit",
            'required'=> false,
            'attr'=>[
                'placeholder' =>"Saisir le nom du produit"
            ]
            ])
            ->add ('prix')
            ->add('description', TextareaType::class)
            ->add ('updatedAt')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chat::class,
        ]);
    }
}
