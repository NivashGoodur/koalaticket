<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;


class AddPhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', FileType::class, [
                'label' => 'Cliquez ou glissez votre photo ici',
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
                    new NotBlank([
                        // Message en cas de formulaire envoyé sans fichier
                        'message' => 'Vous n\'avez pas mis votre image ici !',
                    ])
                ]
            ])
            
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer la photo',
                'attr' => [
                    'class' => 'btn btn-outline-primary col-12'
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