<?php

namespace App\Form;

use App\Entity\Borrowing;
use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\ChoiceList\Factory\Cache\ChoiceAttr;


class BorrowingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => true,
            ])

            ->add('expectedReturnDate', DateType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => true,
            ])

            ->add('effectiveReturnDate', DateType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => true,
            ])

            ->add('borrower', ChoiceType:: class, [
                'required' => true,
                

            ])

            ->add('document', ChoiceType::class, [
                'choice_label' => ChoiceList::attr($this, function (?Product $product) {
                    return $product ? ['data-uuid' => $product->getUuid()] : [];
                }),
            ]);

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Borrowing::class,
        ]);
    }
}
