<?php

namespace App\Form;

use App\Entity\Cd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category')
            ->add('stock')
            ->add('title')
            ->add('format')
            ->add('productCode')
            ->add('plages')
            ->add('duration')
            ->add('isInvolvedIns', CollectionType::class,
                [
                    'entry_type' => IsInvolvedInWithReferencedProductType::class,
                    'label' => 'Creators',
                    'allow_add' => true,
                    'allow_delete' => true,
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
