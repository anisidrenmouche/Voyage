<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Theme;
use App\Entity\Travel;
use App\Entity\Country;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TravelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' =>"Le nom du voyage est obligatoire"
                    ]),
                    ],
            ])
            ->add('description', TextType::class,  [
                'constraints' => [
                    new NotBlank([
                        'message' =>"Votre description ne peux etre vide"
                    ]),
                    ],
            ])
            ->add('poster', FileType:: class , [
                'constraints' => [
                    new NotBlank([
                        'message' =>"L'image est obligatoire"
                    ]),
                    new Image([
                        'mimeTypes' => ['image/jpeg', 'image/gif', 'image/png'],
                        'mimeTypesMessage' =>  " 'L'image doit etre au format jpg' "
                    ])
                    ],
            ])
            //->add('slug')
            ->add('price', MoneyType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' =>"Le prix est obligatoire"
                    ]),
                    new Positive([
                        'message' => "Le prix doit etre positif"
                    ])
                    ],
            ])
            ->add('days', IntegerType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' =>"Les jours sont obligatoire"
                    ]), new Positive([
                        'message' => "Le jours doit etre positif"
                    ])
                    ],
            ])
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' =>'name',
                'placeholder' => '',
                'constraints' => [
                    new NotBlank([
                        'message' =>"le pays est obligatoire"
                    ]),
                    ],
            ])
            ->add('theme', EntityType::class, [
                'class' => Theme::class,
                'choice_label' => 'name',
                'placeholder' => '',

            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name',
                'placeholder' => '',

            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Travel::class,
            
        ]);
    }
}
