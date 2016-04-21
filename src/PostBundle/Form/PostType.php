<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 21-4-16
 * Time: 11:38
 */

namespace PostBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('Content', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array(
                'label' => 'Save Post',
                'attr' => array('class' => 'btn btn-primary')))
            ->add('draft', SubmitType::class, array(
                'label' => 'Draft',
                'attr' => array('class' => 'btn btn-default'),
                'validation_groups' => false));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PostBundle\Entity\Post',
        ));
    }
}