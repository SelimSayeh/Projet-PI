<?php

namespace CastingBundle\Entity;
use AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Entity\NotificationInterface;
use Mgilet\NotificationBundle\Model\Notification as NotificationModel;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Casting
 *
 * @ORM\Table(name="casting")
 * @ORM\Entity(repositoryClass="CastingBundle\Repository\CastingRepository")
 * @Vich\Uploadable
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
    protected $id;

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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="photoCasting", fileNameProperty="photo")
     *
     * @var File
     */
    public $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="text", length=65535, nullable=false)
     */
    public $photo;

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


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

