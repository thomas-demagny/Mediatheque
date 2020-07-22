<?php

namespace App\Form;

use App\Entity\Ebook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

class EbookType extends AbstractType
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
            ->add('format')
            ->add('productCode');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Ebook::class,
        ]);
    }
}
