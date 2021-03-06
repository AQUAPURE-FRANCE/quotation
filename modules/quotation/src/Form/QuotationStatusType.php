<?php

namespace Quotation\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class QuotationStatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('status', ChoiceType::class, [
                'required' => true,
                'label' => 'État du devis',
                'placeholder' => 'Afficher tous les statuts',
                'choices' => [
                    'À valider' => 'validate',
                    'Validé' => 'validated',
                    'Commandé' => 'ordered',
                    'Refusé' => 'refused'
                ],
                'attr' => [
                    'class' => 'input-text'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}