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
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $request->getSession()->set('order',$order);
            return $this->redirectToRoute('louvre_ticket_order_two');
        }

        return $this->render('LouvreTicketBundle:Ticket:order_create.html.twig', ['form' => $form->createView()]);

    }

    public function order_twoCreateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ticketRepo = $em->getRepository('LouvreTicketBundle:Ticket');
        $order=$request->getSession()->get('order');
        $ticket = new Ticket();
        $form = $this->get('form.factory')->create(TicketType::class, $ticket);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order->addTicket($ticket);
            $em->persist($order);
            $em->persist($ticket);
            $em->flush();

            return $this->redirectToRoute('louvre_ticket_homepage');
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
