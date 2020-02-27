<?php

namespace CastingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="CastingBundle\Repository\ParticipationRepository")
 */
class Participation
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
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id", onDelete="CASCADE")
     *})
     */
    private $user;

    /**
     * @var \CastingBundle\Entity\Casting
     *
     * @ORM\ManyToOne(targetEntity="CastingBundle\Entity\Casting")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_casting",referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $casting;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat_casting", type="string", length=255)
     */
    private $resultatCasting;


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
     * Set resultatCasting
     *
     * @param string $resultatCasting
     *
     * @return Participation
     */
    public function setResultatCasting($resultatCasting)
    {
        $this->resultatCasting = $resultatCasting;

        return $this;
    }

    /**
     * Get resultatCasting
     *
     * @return string
     */
    public function getResultatCasting()
    {
        return $this->resultatCasting;
    }

    /**
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \AppBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Casting
     */
    public function getCasting()
    {
        return $this->casting;
    }

    /**
     * @param Casting $casting
     */
    public function setCasting($casting)
    {
        $this->casting = $casting;
    }


}

