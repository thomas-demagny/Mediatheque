<?php

namespace App\Form;

use App\Entity\Creator;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreatorEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', EntityType::class, [
                'class' => Creator::class
                // 'choice_label' => 'Artiste',
                // 'multiple' => true,
                // 'expanded' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Creator::class,
        ]);
    }
}
