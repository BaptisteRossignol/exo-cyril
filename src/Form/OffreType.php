<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Offre;
use App\Entity\Competence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('idCompetence', EntityType::class, [
                'class' => Competence::class,
                "label" => "Competence",
                'choice_label' => "name"
            ])
            ->add('idJob', EntityType::class, [
                'class' => Job::class,
                "label" => "Job",
                'choice_label' => "name"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
