<?php

namespace CastingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CastingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomCasting' ,TextType::class, array(
        'attr' => ['pattern' => '[a-zA-Z- ]*']))
            ->add('numberPlaceCasting')
            ->add('typeCasting',ChoiceType::class,[
                'choices' => [
                    'music' => 'music',
                    'Sport' => 'Sport',
                    'Théatre' => 'Théatre',
                ]])

        ->add('dateCasting')  ->add('imageFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'download_link' => true

            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CastingBundle\Entity\Casting'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'castingbundle_casting';
    }


}
