<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use FOS\UserBundle\Model\User as BaseUser ;

use Mgilet\NotificationBundle\NotifiableInterface;;

use Mgilet\NotificationBundle\Annotation\Notifiable;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @Notifiable(name="NotificationParticipation")
 */
class User extends BaseUser implements NotifiableInterface
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



    /**
     * @return \DateTime
     */
    public function getDate()
    {
        // TODO: Implement getDate() method.
    }

    /**
     * @param \DateTime $date
     *
     * @return NotifiableInterface
     */
    public function setDate($date)
    {
        // TODO: Implement setDate() method.
    }

    /**
     * @return string Notification subject
     */
    public function getSubject()
    {
        // TODO: Implement getSubject() method.
    }

    /**
     * @param string $subject Notification subject
     *
     * @return NotifiableInterface
     */
    public function setSubject($subject)
    {
        // TODO: Implement setSubject() method.
    }

    /**
     * @return string Notification message
     */
    public function getMessage()
    {
        // TODO: Implement getMessage() method.
    }

    /**
     * @param string $message Notification message
     *
     * @return NotifiableInterface
     */
    public function setMessage($message)
    {
        // TODO: Implement setMessage() method.
    }

    /**
     * @return string Link to redirect the user
     */
    public function getLink()
    {
        // TODO: Implement getLink() method.
    }

    /**
     * @param string $link Link to redirect the user
     *
     * @return NotifiableInterface
     */
    public function setLink($link)
    {
        // TODO: Implement setLink() method.
    }

    /**
     * @return ArrayCollection|NotifiableInterface[]
     */
    public function getNotifiableNotifications()
    {
        // TODO: Implement getNotifiableNotifications() method.
    }

    /**
     * @param NotifiableInterface $notifiableNotification
     *
     * @return NotifiableInterface
     */
    public function addNotifiableNotification(NotifiableInterface $notifiableNotification)
    {
        // TODO: Implement addNotifiableNotification() method.
    }

    /**
     * @param NotifiableInterface $notifiableNotification
     *
     * @return NotifiableInterface
     */
    public function removeNotifiableNotification(NotifiableInterface $notifiableNotification)
    {
        // TODO: Implement removeNotifiableNotification() method.
    }
}

