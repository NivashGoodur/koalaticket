<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UpdateNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', TextType::class, [
            'label' => false,
            'attr' => [
                'class' => 'login_input',
                'placeholder' => 'Votre prénom',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Merci d\'entrer votre prénom',
                ]),
                new Length([
                    'min' => 2,
                    'minMessage' => 'Votre prénom doit avoir au moins {{ limit }} caratères',
                    // max length allowed by Symfony for security reasons
                    'max' => 50,
                    'maxMessage' => 'Votre prénom ne peut pas dépasser {{ limit }} caractères',
                ]),
            ],
        ])

        ->add('lastname', TextType::class, [
            'label' => false,
            'attr' => [
                'class' => 'login_input',
                'placeholder' => 'Sujet',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Merci d\'entrer votre nom',
                ]),
                new Length([
                    'min' => 2,
                    'minMessage' => 'Votre nom doit avoir au moins {{ limit }} caratères',
                    // max length allowed by Symfony for security reasons
                    'max' => 50,
                    'maxMessage' => 'Votre nom ne peut pas dépasser {{ limit }} caractères',
                ]),
            ],
        ])
            
        ->add('save', SubmitType::class, [
            'label' => 'Mettre à jour',
            'attr' => [
                'class' => 'login_button',
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

?>