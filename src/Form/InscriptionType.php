<?php

namespace App\Form;

use App\Entity\Inscription;
use App\Entity\Paricipant;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description');
            array(
                'class' => Inscription::class,
                'choice_label' => 'libelle', // libelle est la propriété de l'entité Genre que l'on veut afficher
                'expanded'=>'true',
                'multiple' => true, // permet la sélection multiple
                
            );
        
            
           
    }

    /*public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paricipant::class,
        ]);
    }*/
}
