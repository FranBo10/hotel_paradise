<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('prenom', null, [
            'label' => "Prénom",
            'label_attr' => ['class' => 'text-decoration-primary'],
        ])
        ->add('nom', null, [
            'label' => "Nom",
            'label_attr' => ['class' => 'text-decoration-primary'],
        ])
        ->add('pseudo', null, [
            'label' => "Pseudo",
            'label_attr' => ['class' => 'text-decoration-primary'],
        ])
        ->add('email', null, [
            'label' => "E-Mail",
            'label_attr' => ['class' => 'text-decoration-primary'],
        ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => "E-Mail",
            'label_attr' => ['class' => 'text-decoration-primary'],
            ])
            ->add('civilite', ChoiceType::class, [
                'choices'  => [
                    'Femme' => 'femme',
                    'Homme' => 'homme'
                ],
                'label' => "E-Mail",
            'label_attr' => ['class' => 'text-decoration-primary'],

            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
