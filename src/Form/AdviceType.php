<?php

namespace App\Form;

use App\Entity\Advice;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdviceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de la fiche',
                'required'=> false,
                'attr' => [
                    'placeholder'=> 'Entrez-le ici !'
                ]
            ])
            ->add('content', TextareaType::class, [
                'label'=> 'Description',
                'required'=> false,
                'attr' => [
                    'placeholder'=> 'Ajoutez le détail ici…',
                ]
            ])
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Advice::class,
        ]);
    }
}
