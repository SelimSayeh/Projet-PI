<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="EventsBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \EventsBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="EventsBundle\Entity\User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     *})
     */
    private $user;

    /**
     * @var \EventsBundle\Entity\Events
     *
     * @ORM\ManyToOne(targetEntity="EventsBundle\Entity\Events")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_event",referencedColumnName="id")
     * })
     */
    private $event;

    /**
     * @var int
     *
     * @ORM\Column(name="nbplace_reserv", type="integer")
     */
    private $nbplaceReserv;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereservation", type="date", nullable=false)
     */
    private $datereservation;

    /**
     * @var String
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Reservation
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set event
     *
     * @param string $event
     *
     * @return Reservation
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set nbplaceReserv
     *
     * @param integer $nbplaceReserv
     *
     * @return Reservation
     */
    public function setNbplaceReserv($nbplaceReserv)
    {
        $this->nbplaceReserv = $nbplaceReserv;

        return $this;
    }

    /**
     * Get nbplaceReserv
     *
     * @return int
     */
    public function getNbplaceReserv()
    {
        return $this->nbplaceReserv;
    }

    /**
     * @return String
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param String $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return \DateTime
     */
    public function getDatereservation()
    {
        return $this->datereservation;
    }

    /**
     * @param \DateTime $datereservation
     */
    public function setDatereservation($datereservation)
    {
        $this->datereservation = $datereservation;
    }

}

