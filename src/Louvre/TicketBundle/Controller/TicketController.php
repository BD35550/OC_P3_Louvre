<?php

namespace Louvre\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Louvre\TicketBundle\Entity\Order;
use Louvre\TicketBundle\Entity\Ticket;
use Louvre\TicketBundle\Form\Type\OrderType;
use Louvre\TicketBundle\Form\Type\TicketType;



class TicketController extends Controller
{
    public function orderCreateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ticketRepo = $em->getRepository('LouvreTicketBundle:Ticket');

        $order = new Order();
        $form = $this->get('form.factory')->create(OrderType::class, $order);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $order->setTicketsOrder();
            $em->persist($order);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info','');
            $id = $order->getId();
            return $this->redirectToRoute('louvre_ticket_order_two', compact('id','order'));
        }

        return $this->render('LouvreTicketBundle:Ticket:order_create.html.twig', ['form' => $form->createView()]);

    }

    public function order_twoCreateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ticketRepo = $em->getRepository('LouvreTicketBundle:Ticket');

        $ticket = new Ticket();
        $form = $this->get('form.factory')->create(TicketType::class, $ticket);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $ticket->setTicketsOrder();
            $em->persist($ticket);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info','');
            $id = $ticket->getId();
            return $this->redirectToRoute('louvre_ticket_homepage', compact('id','order'));
        }

        return $this->render('LouvreTicketBundle:Ticket:order_two.html.twig', ['form' => $form->createView()]);
    }

    public function order_treeCreateAction()
    {
        return $this->render('LouvreTicketBundle:Ticket:order_tree.html.twig');
    }

    public function infosCreateAction()
    {
        return $this->render('LouvreTicketBundle:Ticket:infos.html.twig');
    }

    public function mentionsCreateAction()
    {
        return $this->render('LouvreTicketBundle:Ticket:mentions.html.twig');
    }
}
