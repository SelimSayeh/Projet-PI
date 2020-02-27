<?php

namespace EventsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EventsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nameEvent', TextType::class, array(
            'attr' => ['pattern' => '[a-zA-Z- ]*']))

            ->add('dateEvent', DateType::class)

            ->add('nbrPlacesEvent')

            ->add('descriptionEvent', TextType::class , array(
                'attr' => ['pattern' => '[a-zA-Z- ]*']))


            ->add('prixTicket',MoneyType::class, [
                'divisor' => 100]
                                    )

            ->add('imageFile', VichFileType::class, [
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
            'data_class' => 'EventsBundle\Entity\Events'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eventsbundle_events';
    }


}
