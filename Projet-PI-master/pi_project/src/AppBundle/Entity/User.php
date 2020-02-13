<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use FOS\UserBundle\Model\User as BaseUser ;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
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
     * @var int
     *
     * @ManyToOne(targetEntity="CastingBundle\Entity\Casting")
     * @JoinColumn(name="id_casting",referencedColumnName="id")
     */

    private $idCasting;

    /**
     * @return int
     */
    public function getIdCasting()
    {
        return $this->idCasting;
    }

    /**
     * @param int $idCasting
     */
    public function setIdCasting($idCasting)
    {
        $this->idCasting = $idCasting;
    }



}

