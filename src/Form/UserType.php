<?php

namespace App\Form;

use App\Entity\Preferences; 
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email') // Ajoute un champ email
            ->add('roles') // Ajoute un champ roles
            ->add('password') // Ajoute un champ password
            ->add('nom') // Ajoute un champ nom
            ->add('prenom') // Ajoute un champ prenom
            ->add('telephone') // Ajoute un champ telephone
            ->add('lePreferences', EntityType::class, [ // Ajoute un champ lePreferences de type Entity
                'class' => Preferences::class, // La classe liée est Preferences
'choice_label' => 'id', // L'identifiant est utilisé comme label
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void 
    {
        $resolver->setDefaults([
            'data_class' => User::class, // La classe de données liée est User
        ]);
    }
}
