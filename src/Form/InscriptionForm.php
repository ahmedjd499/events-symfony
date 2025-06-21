<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Event;
use App\Entity\Inscription;
use App\Enum\EtatI;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateI', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('etatI', EnumType::class, [
                'class' => EtatI::class,
                'choice_label' => 'label',
                'placeholder' => 'Select status',
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => function($client) {
                    return $client->getPrenom() . ' ' . $client->getNom();
                },
                'placeholder' => 'Select a client',
            ])
            ->add('event', EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'nom',
                'placeholder' => 'Select an event',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
