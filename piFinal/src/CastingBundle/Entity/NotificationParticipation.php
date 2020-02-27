<?php

namespace CastingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\Entity\NotificationInterface;
use Mgilet\NotificationBundle\Model\Notification as NotificationModel;


/**
 * Class NotificationrParticipation
 *
 * @ORM\Entity(repositoryClass="CastingBundle\Repository\NotificationrParticipationRepository")
 * @package Casting\Entity\NotificationParticipation
 *
 */
class NotificationParticipation  extends NotificationModel implements NotificationInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

