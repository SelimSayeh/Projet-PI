<?php

namespace CastingBundle\Entity;
use AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Casting
 *
 * * @ORM\Table(name="casting")
 * @ORM\Entity(repositoryClass="CastingBundle\Repository\CastingRepository")
 */
class Casting
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_Casting", type="datetime")
     */
    private $dateCasting;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_Casting", type="string", length=255)
     */
    private $nomCasting;

    /**
     * @var string
     *
     * @ORM\Column(name="type_Casting", type="string", length=255)
     */
    private $typeCasting;


    /**
     * @var int
     *
     * @ORM\Column(name="number_Place_Casting", type="integer")
     */
    private $numberPlaceCasting;


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
     * Set dateCasting
     *
     * @param \DateTime $dateCasting
     *
     * @return Casting
     */
    public function setDateCasting($dateCasting)
    {
        $this->dateCasting = $dateCasting;

        return $this;
    }

    /**
     * Get dateCasting
     *
     * @return \DateTime
     */
    public function getDateCasting()
    {
        return $this->dateCasting;
    }

    /**
     * Set typeCasting
     *
     * @param string $typeCasting
     *
     * @return Casting
     */
    public function setTypeCasting($typeCasting)
    {
        $this->typeCasting = $typeCasting;

        return $this;
    }

    /**
     * Get typeCasting
     *
     * @return string
     */
    public function getTypeCasting()
    {
        return $this->typeCasting;
    }



    /**
     * Set numberPlaceCasting
     *
     * @param integer $numberPlaceCasting
     *
     * @return Casting
     */
    public function setNumberPlaceCasting($numberPlaceCasting)
    {
        $this->numberPlaceCasting = $numberPlaceCasting;

        return $this;
    }

    /**
     * Get numberPlaceCasting
     *
     * @return int
     */
    public function getNumberPlaceCasting()
    {
        return $this->numberPlaceCasting;
    }

    /**
     * @return string
     */
    public function getNomCasting()
    {
        return $this->nomCasting;
    }

    /**
     * @param string $nomCasting
     */
    public function setNomCasting($nomCasting)
    {
        $this->nomCasting = $nomCasting;
    }

}

