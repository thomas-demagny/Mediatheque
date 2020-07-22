<?php

namespace App\Form;

use App\Entity\Ebook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EbookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('category')
            ->add('stock')
            ->add('title')
            ->add('format')
            ->add('productCode');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Ebook::class,
        ]);
    }
}
