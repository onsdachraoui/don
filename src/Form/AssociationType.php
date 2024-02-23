<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
            $builder
                ->add('nom',null,['attr'=>['placeholder'=> "Nom"]])
                ->add('telephone',null,['attr'=>['placeholder'=> "Telephone"]])
                ->add('email',null,['attr'=>['placeholder'=> "Email"]])
                ->add('lieu',null,['attr'=>['placeholder'=> "Email"]])
                ->add('codePostal',null,['attr'=>['placeholder'=> "Code Postal"]])
                ->add('description',null,['attr'=>['placeholder'=> "Description"]])
            
                
    
                ->add('Valider', SubmitType::class);
            ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Association::class,
        ]);
    }
}
