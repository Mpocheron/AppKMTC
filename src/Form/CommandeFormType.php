<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Casier;
use App\Entity\Commande;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hauteur')
            ->add('largeur')
            ->add('longueur')
            ->add('poids')
            ->add('leUser', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('adresseExpedition', EntityType::class, [
                'class' => Adresse::class,
'choice_label' => 'id',
            ])
            ->add('adresseDestination', EntityType::class, [
                'class' => adresse::class,
'choice_label' => 'id',
            ])
            ->add('adresseFacturation', EntityType::class, [
                'class' => Adresse::class,
'choice_label' => 'id',
            ])
            ->add('leCasier', EntityType::class, [
                'class' => Casier::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
