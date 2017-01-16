<?php
// src/Louvre/TicketBundle/Form/Type/TicketType.php

namespace Louvre\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
/**
* {@inheritdoc}
*/
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
->add('lastName',      TextType::class, ['label'        => 'Nom'])
->add('firstName', TextType::class, ['label'        => 'Prénom'])
->add('country',   CountryType::class, [
'label'             => 'Pays',
'preferred_choices' => ['FR'],
])
->add('birthDate', BirthdayType::class, ['label'    => 'Date de naissance'])
->add('reduced',   CheckboxType::class, [
'required' => false,
'label'    => 'Tarif réduit',
'attr'     => ['class' => 'reduced-info'],
])
    ->add('Etape 3- Poursuivre vers paiement',              SubmitType::class)
;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'Louvre\TicketBundle\Entity\Ticket'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'louvre_ticketbundle_ticket';
}


}