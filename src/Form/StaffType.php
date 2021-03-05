<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;



class StaffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'La confirmation du mot de passe est incorrecte',
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Votre mot de passe',
                ],
                'first_options' => [
                    'label' => 'Mot de passe',
                ],
                'second_options' => [
                    'label' => 'Confirmation du mot de passe',

                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit avoir au moins {{ limit }} caratères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => "/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ !\"\#\$%&\'\(\)*+,\-.\/:;<=>?@[\\^\]_`\{|\}~])^.{8,4096}$/",
                        'message' => 'Votre mot de passe doit contenir obligatoirement une minuscule, une majuscule, un chiffre et un caractère spécial'
                    ]),
                ],
            ])

            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Votre prénom',
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre prénom',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Votre prénom doit contenir {{ limit }} caractères minimum',
                        'maxMessage' => 'Votre prénom ne peut contenir plus de {{ limit }} caractères',
                    ]),
                ],
            ])

            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Votre nom',
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre Nom',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Votre nom doit contenir {{ limit }} caractères minimum',
                        'maxMessage' => 'Votre nom ne peut contenir plus de {{ limit }} caractères',
                    ]),
                ],
            ])

            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Votre email',
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre email',
                    ]),
                    ],
            ])

            ->add('save', SubmitType::class, [ // Ajout d'un champ de type bouton de validation
                'label' => 'Créer article',    // Texte du bouton
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
