<?php

namespace App\Form;

use App\Entity\Cd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

class CdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Hip-hop' => 'Hip-hop',
                        'Country' => 'Country',
                        'Rock' => 'Rock',
                        'R&b' => 'R&b',
                    ]]])

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
