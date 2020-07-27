<?php

namespace App\Form;

use App\Entity\Journal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JournalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('category')
            ->add('stock')
            ->add('title')
            ->add('format')
            ->add('productCode')
            ->add('periodicity')
            ->add('subscriptionDate');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Journal::class,
        ]);
    }
}
