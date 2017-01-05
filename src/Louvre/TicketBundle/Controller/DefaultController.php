<?php

namespace Louvre\TicketBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Louvre\TicketBundle\Entity\Ticket;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class DefaultController extends Controller
{
    public function indexAction()
    	{
    
    	$ticket= new Ticket();
    	$formBuilder=$this->get('form.factory')->createBuilder(FormType::class, $ticket);
    	
        $formBuilder
    
    		//->add( 'bookingdate', DateType::class, array( 'label' -> 'Date de Réservation'))
    		->add('quantity', IntegerType::class)
    		->add('type', ChoiceType::class,['choices'=>['journée'=>1,'demi-journée'=>2]])
    		->add('visitdate', DateType::class)
    		->add('email', TextType::class)
    		->add ('save', SubmitType::class)
            ;

    	$form = $formBuilder->getForm();
    	return $this->render('LouvreTicketBundle:Ticket:index.html.twig', array('form' => $form->createView(),
    ));
    }
}