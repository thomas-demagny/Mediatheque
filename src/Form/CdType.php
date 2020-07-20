<?php

namespace App\Form;

use App\Entity\Cd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;


class CdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Rock' => 'rock',
                        'Hip-hop' => 'hip-hop',
                        'Country' => 'country',
                        'Pop' => 'pop',
                    ],
                
                
                ],
                'required' => true,
                
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
                        'Cd' => 'Cd',
                        'Vinyle' => 'Vynile',
                        
                    ],
                ],
            ])

            ->add('ProductCode', IntegerType::class, [
                'required' => true,
                
            ])

            ->add('plages', IntegerType::class, [
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
            'data_class' => Cd::class,
        ]);
    }
}
