<?php
// src/Louvre/TicketBundle/Entity/Ticket.php

namespace Louvre\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Louvre\TicketBundle\Entity\Order;

/**
 * @ORM\Table(name="table_ticket")
 * @ORM\Entity(repositoryClass="Louvre\TicketBundle\Repository\TicketRepository")
 */
class Ticket
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     *
     */
    protected $lastName;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     *
     */
    protected $firstName;

    /**
     * @ORM\Column(name="country", type="string")
     *
     */
    protected $country;

    /**
     * @ORM\Column(name="birth_date", type="date")
     *
     */
    protected $birthDate;

    /**
     * @ORM\Column(name="reduced", type="boolean")
     *
     */
    protected $reduced = false;

    /**
     * @ORM\Column(name="code", type="string", nullable=true)
     *
     */
    protected $code;

    /**
     * @ORM\ManyToOne(targetEntity="Louvre\TicketBundle\Entity\Order", inversedBy="tickets", cascade={"persist"})
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * @Assert\Type("object")
     */
    protected $order;

    /**
     * @ORM\Column(name="used", type="boolean", nullable=true)
     * @Assert\Type("bool")
     */
    protected $used = false;

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
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set reduced
     *
     * @param boolean $reduced
     */
    public function setReduced($reduced)
    {
        $this->reduced = $reduced;
    }

    /**
     * Get reduced
     *
     * @return boolean
     */
    public function getReduced()
    {
        return $this->reduced;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getcode()
    {
        return $this->code;
    }

    /**
     * Generate code
     */
    public function generatecode()
    {
        $code = 'AZHETF';
        $this->validationCode = $code;
    }

    /**
     * Set used
     *
     * @param boolean $used
     */
    public function setUsed($used)
    {
        $this->used = $used;
    }

    /**
     * Get used
     *
     * @return boolean
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Set order
     *
     * @param \Louvre\TicketBundle\Entity\Order $order
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get order
     *
     * @return \Louvre\TicketBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set TicketsOrder
     */
    public function setTicketsOrder()
    {


        }

}
