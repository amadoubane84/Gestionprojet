<?php

namespace App\Form;

use App\Entity\Projet;
use App\Entity\Visite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Visite')
            ->add('etat',choiceType::class, [
                'choices'=>$this->getChoices1()
            ])
            ->add('nomprojet',EntityType::class, [
                'class'=>Projet::class,
                'choice_label'=>'Titreprojet',
                'attr'=>[
                    'class'=>'selection'
                ]
            ])
            
            ->add('brochure', FileType::class, [
                'label' => 'Brochure (PDF file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
  
    }
    private function getChoices1(){
        $choices1= Visite::CHOIX;
        $output1=[];
        foreach ($choices1 as $k=>$v){
            $output1[$v]=$k;
        }
        return $output1;
    }
}

