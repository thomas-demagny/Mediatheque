<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productCode')
            ->add('stock')
            ->add('format')
            ->add('category')
            ->add('isInvolvedIns', CollectionType::class,
                [
                    'entry_type' => IsInvolvedInWithReferencedProductType::class,
                    'label' => 'Creators',
                    'allow_add' => true,
                    'allow_delete' => true,
                ])
            ->add('title')
            ->add('pages')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
