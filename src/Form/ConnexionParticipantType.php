<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Participant;
use App\Entity\Serie;
use App\Repository\ParticipantRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConnexionParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login')
            ->add('password');
                array(
                    'class' => Participant::class,
                    'choice_label' => 'libelle', // libelle est la propriété de l'entité Genre que l'on veut afficher
                    'expanded'=>'true',
                    'multiple' => true, // permet la sélection multiple
                    
                );
            
                }

    /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }*/
}
