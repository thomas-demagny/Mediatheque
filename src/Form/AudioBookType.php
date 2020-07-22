<?php

namespace App\Form;

use App\Entity\AudioBook;
use App\Entity\IsInvolvedIn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

class AudioBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Action' => 'action',
                        'Aventure' => 'aventure',
                        'Comedie' => 'comedie',
                        'Romance' => 'romance',
                    ]]])

            ->add('stock')
            ->add('title')
            ->add('isInvolvedIns', CollectionType::class, [
                    'entry_type' => IsInvolvedInWithReferencedProductType::class,
                    'label' => 'Creators',
                    'allow_add' => true,
                    'allow_delete' => true,
                ])
            ->add('format')
            ->add('productCode')
            ->add('duration');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => AudioBook::class,
        ]);
    }
}
