<?php

namespace App\Form;

use App\Entity\Propertie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['required' => false])
            ->add('price', NumberType::class, ['required' => false])
            ->add('description', TextareaType::class, ['required' => false])
            ->add('surface', TextType::class, ['required' => false])
            ->add('image', FileType::class, ['data_class' => null, 'required' => false])
            ->add('author', TextType::class, ['required' => false])
            //->add('createdAt')  Pas besoin car ils sont générés automatiquement
            //->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Propertie::class,
        ]);
    }
}
