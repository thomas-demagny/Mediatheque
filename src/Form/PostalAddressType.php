<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostalAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('addressLine1', TextType::class, [
                'help' => 'Rue, n°, Entité Sociale',
                'label' => 'Adresse 1',
            ])
            ->add('addressLine2', TextType::class, [
                'help' => 'Appartement, Résidence, Etage',
                'label' => 'Adresse 2',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('state', TextType::class, [
                'label' => 'Pays',
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code Postal',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
