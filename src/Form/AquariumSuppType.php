<?php

namespace App\Form;

use App\Entity\Aquarium;
use App\Entity\Marques;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AquariumSuppType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Description')
            ->add('Contenance')
            ->add('Matiere')
            ->add('Dimensions')
            ->add('Accessoire')
            ->add('Poid')
            ->add('Marque')
            ->add('id_marque', EntityType::class, [
                'class' => Marques::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Aquarium::class,
        ]);
    }
}
