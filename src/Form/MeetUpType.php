<?php

namespace App\Form;

use App\Entity\MeetUp;
use App\Entity\Employee;
use App\Entity\Creator;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeetUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('title')
            ->add('organizer', EntityType::class, [
                'class' => Employee::class,
                'multiple' => true
            ])
            ->add('date')
            ->add('guests', EntityType::class, [
                'class' => Creator::class,
                'multiple' => true
            ])
            ->add('maxPlaces');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => MeetUp::class,
        ]);
    }
}
