<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Participant;
use App\Entity\Serie;
use App\Repository\ParticipantRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('adressemail')
            ->add('datenaissance')
            ->add('portfolio')
            ->add('login')
            ->add('password', PasswordType::class);
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
