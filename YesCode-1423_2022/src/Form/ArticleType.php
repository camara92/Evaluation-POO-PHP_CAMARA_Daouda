<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [ 
                'label' => "Titre de l'article", 
                "attr" => ["placeholder" => "votre titre ici"]
            ])
            ->add('intro', TextType::class, [ 
                'label' => "Votre intro", 
                "attr" => ["placeholder" => "Une petite intro là..."
                ]
            ])
            ->add('content', TextareaType::class, [ 
                'label' => "Contenu", 
                "attr" => ["placeholder" => "ici une belle histoire"]
            ])
            ->add('image', TextType::class, [ 
                'label' => "Url de l'image", 
                "attr" => ["placeholder" => "Le lien de votre image !"]
            ])
           
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
