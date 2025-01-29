<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('instructions', CollectionType::class, [
                'entry_type' => TextType::class,
                'entry_options' => [
                    'attr' => ['class' => 'form-control']
                ],
                'allow_add' => true,
                'keep_as_list' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
