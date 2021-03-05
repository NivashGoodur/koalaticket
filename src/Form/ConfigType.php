<?php

namespace App\Form;

use App\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Nom du site',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer le titre du Ticket',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le titre du ticket doit avoir au moins {{ limit }} caratères',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                        'maxMessage' => 'Le titre du ticket ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('logo', FileType::class, [
                'attr' => [
                    'class' => 'login_input',
                ],
                'label' => 'Modifier votre logo ici',
                'constraints' => [
                    new File([
                        // Taille maximum de 1Mo
                        'maxSize' => '1M',

                        // jpg et png uniquement
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],

                        // Message d'erreur en cas de fichier au type non autorisé
                        'mimeTypesMessage' => 'L\'image doit être de type jpg ou png',

                        // Message en cas de fichier trop gros
                        'maxSizeMessage' => 'Fichier trop volumineux ({{ size }} {{ suffix }}). La taille maximum autorisée est {{ limit }}{{ suffix }}',
                    ]),
                ]
            ])
            ->add('color', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Couleur HEXA, laissez vide pour garder l\'actuelle',
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le titre du ticket doit avoir au moins {{ limit }} caratères',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                        'maxMessage' => 'Le titre du ticket ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('staff_name', TextType::class, [
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Le nom de votre équipe',
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner le nom de votre tableau',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Le nom de votre tableau doit contenir {{ limit }} caractères minimum',
                        'maxMessage' => 'Le nom de votre tableau ne peut contenir plus de {{ limit }} caractères',
                    ]),
                    ],
            ])
            ->add('is_set', HiddenType::class, [
                'label' =>false,
                'attr' => [
                    'class' => 'login_input',
                    'value' => 'en attente',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-outline-primary col-12'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Config::class,
        ]);
    }
}
