<?php

namespace Louvre\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('bookingDate',         DateType::class, [
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
                'mapped'      => false,
            ])

            ->add('Etape 2',              SubmitType::class)

            /*->add('bookingDate', DateType::class, [
                'label' => 'Choisissez votre jour de visite',
                'html5' => true,
                'widget' => 'single_text',
                'format'  => 'dd/MM/yyyy',
                'model_timezone' => 'Europe/Paris',
                'attr' => ['class' => 'datepicker', 'readonly' => 'readonly'],
            ])*/
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