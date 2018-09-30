<?php

namespace App\Form;

use App\Entity\LignesCde;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LignesCdeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qte_ligne_cde')
            // ->add('prixParQte')
            // ->add('commande')
            ->add('livre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LignesCde::class,
        ]);
    }
}
