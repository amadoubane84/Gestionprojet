<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username',TextType::class ,['label'=>'Nom d\'utilisateur'])
        ->add('roles', ChoiceType::class,[
            'required'=>true,
            'multiple'=>false,
            'expanded'=>false,
            'choices'=>[
                'Utilisateur'=>'ROLE_USER',
                'Administrateur'=>'ROLE_ADMIN',
            ],
        ])
        ->add('password', PasswordType::class, ['label'=>'Mot de passe'])
    ;
        $builder->get('roles')
               ->addModelTransformer(new CallbackTransformer(
                    function($rolesArray){
                        return count($rolesArray) ? $rolesArray[0]:null;
                    },
                    function($rolesString){
                        return [$rolesString];
                    }
               ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
