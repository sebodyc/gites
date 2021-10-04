<?php

namespace App\Form;

use App\Entity\Photos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PhotosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('image')

            ->add('name',TextType::class,[
                'label' => "Nom de la photos",
                'help' => "soignez la mise en forme"
            ])
            ->add('description',TextType::class,[
                'label' => "description de la photos",
                'help' => "soyez precis"
            ])
            ->add('category' ,ChoiceType::class,[
                'choices'=> [
                    'pro'=>"pro",
                    'particulier'=>'particulier'
                ]
            ])
            ->add('type'  ,ChoiceType::class,[
                'choices'=> [
                    'portail'=>"portail",
                    'pergola'=>'pergola',
                    'garde-corps'=>'garde',
                    'verriere'=>'verriere',
                    'grilles'=>'grilles',
                    'escaliers'=>'escalier',
                    'pros'=>'pros'


                ]
            ])
            ->add('imageFile', VichImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photos::class,
        ]);
    }
}
