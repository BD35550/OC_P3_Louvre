<?php


namespace Louvre\TicketBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="table_order")
 * @ORM\Entity(repositoryClass="Louvre\TicketBundle\Repository\OrderRepository")

 */
class Order
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="booking_date", type="datetime")
     *
     */
    protected $bookingDate;

    /**
     * @ORM\Column(name="quantity", type="integer")
     *
     */
    protected $quantity;

    /**
     * @ORM\Column(name="visit_date", type="datetime")
     *
     */
    protected $visitDate;

    /**
     * @ORM\Column(name="tickets_type", type="string")
     *
     */
    protected $ticketsType;

    /**
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     * @Assert\Email()
     */
    protected $mail;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Louvre\TicketBundle\Entity\Ticket", mappedBy="order", cascade={"persist"})
     *
     */
    protected $tickets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->bookingDate = new \DateTime('now');
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bookingDate
     *
     * @param \DateTime $bookingDate
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;
    }

    /**
     * Get bookingDate
     *
     * @return \DateTime
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set visitDate
     *
     * @param \DateTime $visitDate
     */
    public function setVisitDate($visitDate)
    {
        $this->visitDate = $visitDate;
    }

    /**
     * Get visitDate
     *
     * @return \DateTime
     */
    public function getVisitDate()
    {
        return $this->visitDate;
    }

    /**
     * Set ticketsType
     *
     * @param string $ticketsType
     */
    public function setTicketsType($ticketsType)
    {
        $this->ticketsType = $ticketsType;
    }

    /**
     * Get ticketsType
     *
     * @return string
     */
    public function getTicketsType()
    {
        return $this->ticketsType;
    }

    /**
     * Set mail
     *
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
    /**
     * Add ticket
     *
     * @param Ticket $ticket
     */
    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;
    }

    /**
     * Remove ticket
     *
     * @param Ticket $ticket
     */
    public function removeTicket(Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Set TicketsOrder
     */
    public function setTicketsOrder()
    {
        foreach ($this->tickets as $ticket) {
            $ticket->setOrder($this);
        }
    }
}