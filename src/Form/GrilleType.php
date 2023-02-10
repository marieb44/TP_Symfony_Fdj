<?php

namespace App\Form;

use App\Entity\Grille;
use Doctrine\DBAL\Types\SimpleArrayType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', Datetype::class,
                [
                    'html5' => true,
                    'widget' => 'single_text'
                ]
            )
            ->add('num1')
            ->add('num2')
            ->add('num3')
            ->add('num4')
            ->add('num5')
            ->add('numChance')
//            ->add('tirageFait')
//            ->add('joueur', ['label' => 'Joueur'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Grille::class,
        ]);
    }
}
