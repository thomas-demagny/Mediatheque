<?php

namespace App\Form;

use App\Entity\AudioBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AudioBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category',  ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Action' => 'action',
                        'Aventure' => 'aventure',
                        'Comedie' => 'comedie',
                        'Romance' => 'romance',
                    ],
                ],
                
            ])

            ->add('stock', IntegerType::class, [
                'required' => true,
                
            ])
            ->add('title', TextType::class, [
                'required' => true,
            ])

            ->add('format', ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Poche' => 'Poche',
                        'Relier' => 'Relier',
                        'Pleiade' => 'Pleiade',
                    ],
                ],
            ])

            ->add('ProductCode', IntegerType::class, [
                'required' => true,
                
            ])

            ->add('duration', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => true,
            ])

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AudioBook::class,
        ]);
    }
}
