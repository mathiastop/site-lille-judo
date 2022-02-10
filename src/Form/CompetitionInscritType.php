<?php

namespace App\Form;

use App\Entity\CompetitionInscrit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('prenom')
            ->add('club')
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Femme' => 'Femme',
                    'Homme' => 'Homme',
                ],
            ])
            ->add('poids', NumberType::class, [
                'label' => 'Poids (Kg)'
            ])
            ->add('dateNaissance', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('mail', EmailType::class)
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Baby' => 'Baby',
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
