<?php

namespace App\Form;

use App\Entity\Suite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [ 
                    'class' => 'form-control'

                ],
                'label' => 'Titre :',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('image', TextType::class, [
                'attr' => [ 
                    'class' => 'form-control'

                ],
                'label' => 'Image de garde de la suite :',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('description', TextType::class,[
                'attr' => [ 
                    'class' => 'form-control'

                ],
                'label' => 'Description :',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('galerieImage', TextType::class, [
                'attr' => [ 
                    'class' => 'form-control'

                ],
                'label' => 'Galerie de photos de la suites',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('prix', MoneyType::class, [
                'attr' => [ 
                    'class' => 'form-control'

                ],
                'label' => 'Prix *exemple : 200',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success mt-5'
                ],
                'label' => 'Ajouter la suite'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suite::class,
        ]);
    }
}
