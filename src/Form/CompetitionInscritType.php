<?php

namespace App\Form;

use App\Entity\CompetitionInscrit;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionInscritType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('age', NumberType::class)
            ->add('mail', EmailType::class)
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Mini-Poussins' => 'Mini-Poussins',
                    'Poussins' => 'Poussins',
                    'Benjamins' => 'Benjamins',
                    'Minimes' => 'Minimes',
                    'Cadets' => 'Cadets',
                    'Juniors' => 'Juniors',
                    'Seniors' => 'Seniors',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompetitionInscrit::class,
        ]);
    }
}
