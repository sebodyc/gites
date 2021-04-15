<?php

namespace App\Form;

use App\Entity\Activitees;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActiviteesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('titre', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[
                'label' => "Titre de l'activitée",
                'help' => "soignez la mise en forme"
            ])
            ->add('categories',ChoiceType::class,[
                'choices'=> [
                    'sport'=>"sport",
                    'balades'=>'balades',
                    'gastronomie'=>'gastronomie'
                ]
            ])
            ->add('description', TextareaType::class,[
                'label' => "Description de l'activitée",
                'attr' => ['placeholder' => "Faites envie avec une jolie description"],
                'help' => "soignez la mise en forme"
            ])
            ->add('localisation',TextareaType::class,[
                'label' => "lien localisation google map",
                'attr' => ['placeholder' => "collez le liens http de google map"],
                'help' => "commence par https://www.google et fini par 2sfr attention ne pas inclure les guillemets "
            ])

            ->add('imageFile', VichImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activitees::class,
        ]);
    }
}
