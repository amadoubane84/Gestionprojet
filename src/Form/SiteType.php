<?php

namespace App\Form;

use App\Entity\Site;
use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lieusite')
            ->add('responsable')
            ->add('contact')
            ->add('nomprojet',EntityType::class, [
                'class'=>Projet::class,
                'choice_label'=>'Titreprojet',
                'attr'=>[
                    'class'=>'selection'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Site::class,
        ]);
    }
}
