<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titreprojet')
            ->add('Maitreouvrage')
            ->add('Entreprise')
            ->add('Dateos', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                
            ])
            ->add('Datefincontrat',DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                
            ])
            ->add('site')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
