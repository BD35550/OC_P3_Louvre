<?php

namespace Louvre\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Louvre\TicketBundle\Form\Type\TicketType;


class OrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('visitDate',         DateType::class, [
                'label' => 'Choisissez votre jour de visite',
                'data'  => new \Datetime(),
                'format' => 'dd/MM/y',
                'years' => range(date('Y'), date('Y') + 5),
            ])


            ->add('ticketsType',       ChoiceType::class, [
                'choices'  => [
                    'journée'      => 'journée',
                    'demi-journée' => 'demi-journée',
                ],
                'label'    => 'Type de billets'
            ])
            ->add('quantity',         ChoiceType::class, [
                'placeholder' => '...',
                'choices'     => array_combine(range(1,10),range(1,10)),
                'label'       => 'Nombre de billet(s)',

            ])
            ->add('mail',      TextType::class, ['label'        => 'Courriel'])

            ->add('Etape 2',              SubmitType::class)


        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\TicketBundle\Entity\Order'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_ticketbundle_order';
    }
}