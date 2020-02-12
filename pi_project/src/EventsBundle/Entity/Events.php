<?php

namespace EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="EventsBundle\Repository\EventsRepository")
 */
class Events
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
     * @var string
     *
     * @ORM\Column(name="name_Event", type="string", length=255)
     */
    private $nameEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_Event", type="datetime")
     */
    private $dateEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_places_Event", type="integer")
     */
    private $nbrPlacesEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="description_Event", type="string", length=255)
     */
    private $descriptionEvent;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_ticket", type="float")
     */
    private $prixTicket;


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
     * Set nameEvent
     *
     * @param string $nameEvent
     *
     * @return Events
     */
    public function setNameEvent($nameEvent)
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

    /**
     * Get nameEvent
     *
     * @return string
     */
    public function getNameEvent()
    {
        return $this->nameEvent;
    }

    /**
     * Set dateEvent
     *
     * @param \DateTime $dateEvent
     *
     * @return Events
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    /**
     * Get dateEvent
     *
     * @return \DateTime
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Set nbrPlacesEvent
     *
     * @param integer $nbrPlacesEvent
     *
     * @return Events
     */
    public function setNbrPlacesEvent($nbrPlacesEvent)
    {
        $this->nbrPlacesEvent = $nbrPlacesEvent;

        return $this;
    }

    /**
     * Get nbrPlacesEvent
     *
     * @return int
     */
    public function getNbrPlacesEvent()
    {
        return $this->nbrPlacesEvent;
    }

    /**
     * Set descriptionEvent
     *
     * @param string $descriptionEvent
     *
     * @return Events
     */
    public function setDescriptionEvent($descriptionEvent)
    {
        $this->descriptionEvent = $descriptionEvent;

        return $this;
    }

    /**
     * Get descriptionEvent
     *
     * @return string
     */
    public function getDescriptionEvent()
    {
        return $this->descriptionEvent;
    }

    /**
     * Set prixTicket
     *
     * @param float $prixTicket
     *
     * @return Events
     */
    public function setPrixTicket($prixTicket)
    {
        $this->prixTicket = $prixTicket;

        return $this;
    }

    /**
     * Get prixTicket
     *
     * @return float
     */
    public function getPrixTicket()
    {
        return $this->prixTicket;
    }
}

