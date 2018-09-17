<?php

namespace App\Form;

use App\Entity\Livres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FiltreCatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('auteur')
            // ->add('editeur')
            ->add('categorie')
            // ->add('date_parution')
            ->add('est_conseil', ChoiceType::class, ['choices' => ['Oui' => true, 'Non' => false]])
            // ->add('isbn')
            // ->add('titre')
            // ->add('nb_pages')
            // ->add('prix_ht')            
            // ->add('resume')
            // ->add('image')
            // ->add('updatedAt')
            // ->add('active')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livres::class,
        ]);
    }
}
