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
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Action' => 'action',
                        'Aventure' => 'aventure',
                        'Comedie' => 'comedie',
                        'Romance' => 'romance',
                    ]]])
            ->add('productCode', TextType::class, [
                'required' => true,
            ])

            ->add('stock', TextType::class, [
                'required' => true,
            ])
            
            ->add('periodicity', ChoiceType::class, [
                'choices' => [
                    'Main Statuses' => [
                        'Annuel' => 'annuel',
                        'Semestriel' => 'semestriel',
                        'Trimestriel' => 'trimestriel',
                        'Mensuel' => 'mensuel',
                        'Quinzaine' => 'quinzaine',
                        'Hebdomadaire' => 'hebdomadaire',
                        'Quotidien' => 'quotidien',
                        
                    ]]])
            
            ->add('title')
            ->add('format')
            ->add('subscriptionDate');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Journal::class,
        ]);
    }
}
