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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Events
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Events $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
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

