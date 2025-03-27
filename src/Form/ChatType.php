<?php

namespace App\Form;

use App\Entity\Chat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;

class ChatType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('imageFile', FileType::class, [
'mapped' => false,
'required' => false,
'label' => "image"
])
->add('image', TextType::class, [
'attr' => []
])
->add('nom', TextType::class, [
'attr' => [
'class' => 'form-control',
'placeholder' => "Saisir le nom du produit"
],
'label' => "Nom du produit",
'required' => true
])
->add('prix')
->add('description', TextType::class, [
'attr' => [
'class' => 'form-control',
'placeholder' => "Saisir une description"
]
])
->add('categorie', EntityType::class, [
'class' => Categorie::class,
'choice_label' => 'nom',
'multiple' => true,
'expanded' => false,
'required' => false
]);
}

public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => Chat::class,
]);
}
}