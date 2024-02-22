<?php

namespace App\Form;

use App\Entity\Don;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $typeOptions = [
            'Argent' => 'Argent',
            'Objet' => 'Objet',
        ];

        $builder
            ->add('nom',null,['attr'=>['placeholder'=> "Nom"]])
            ->add('prenom',null,['attr'=>['placeholder'=> "Prenom"]])
            ->add('idUtilisateur',null,['attr'=>['placeholder'=> "ID Utilisateur"]])
            ->add('email',null,['attr'=>['placeholder'=> "Email"]])
            ->add('date',null,['attr'=>['placeholder'=> "Date"]])
            ->add('idAssociation',null,['attr'=>['placeholder'=> "ID Association"]])
            ->add('type', ChoiceType::class, [
                'choices' => $typeOptions,
                'expanded' => true, // Ensure radio button layout
                'multiple' => false, // Select single value
                'label' => 'Type de don', // Optional label
            ])
            ->add('Confirmer', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Don::class,
        ]);
    }
}
