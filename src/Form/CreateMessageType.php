<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class CreateMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'login_input',
                    'placeholder' => 'Écrivez votre réponse',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez écrire un message'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le message doit contenir au minimum {{ limit }} caractères',
                        'max' => 5000,
                        'maxMessage' => 'Le message doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])

            ->add('save', SubmitType::class, [ // Ajout d'un champ de type bouton de validation
                'label' => 'Répondre'    // Texte du bouton
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
