<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'date')
            ->add('titre', 'text')
            ->add('auteur', 'text')
            ->add('contenu', 'textarea')
            ->add('publication', 'checkbox', array(
                'required' => false
            ))
            ->add('image', new ImageType())
            ->add('categories', 'entity',array(
                'class' => 'SdzBlogBundle:Categorie',
                'property' => 'nom',
                'multiple' => true
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Article'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_articletype';
    }
}
