<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Movie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Title',
                    'style' => 'margin-bottom:15px; width: 50%; margin: 15px auto;'
                ],
                'label' => false
            ])
            ->add('releaseYear', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Release year',
                    'style' => 'margin-bottom:15px; width: 50%; margin: 15px auto;'
                ],
                'label' => false
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Description',
                    'style' => 'margin-bottom:15px; width: 50%; margin: 15px auto;'
                ],
                'label' => false
            ])
            ->add('imagePath', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Image path',
                    'style' => 'margin-bottom:15px; width: 50%; margin: 15px auto;'
                ],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
