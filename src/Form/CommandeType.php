<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_arrivee', DateType::class, [
                'label' => 'Date d\'arrivée',
                'label_attr' => ['class' => 'text-white bg-info p-1 rounded'],
                'widget' => 'single_text',
            ])
            ->add('date_depart', DateType::class, [
                'label' => 'Date de départ',
                'label_attr' => ['class' => 'text-white bg-info p-1 rounded'],
                'widget' => 'single_text',
            ])
            ->add('prenom', TextType::class, ['label' => 'Prénom',
                'label_attr' => ['class' => 'text-white bg-info p-1 rounded']])
            ->add('nom', TextType::class, ['label' => 'Nom',
                'label_attr' => ['class' => 'text-white bg-info p-1 rounded']])
            ->add('telephone', TextType::class, ['label' => 'Téléphone',
                'label_attr' => ['class' => 'text-white bg-info p-1 rounded']])
            ->add('email', EmailType::class, ['label' => 'E-Mail',
                'label_attr' => ['class' => 'text-white bg-info p-1 rounded']])
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
