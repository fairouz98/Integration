<?php

namespace LogistiqueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ligne
 *
 * @ORM\Table(name="ligne")
 * @ORM\Entity(repositoryClass="LogistiqueBundle\Repository\ligneRepository")
 */
class ligne
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
     * @ORM\OneToMany(targetEntity="LogistiqueBundle\Entity\bus", mappedBy="ligne")
     */
    private $buss;

    public function __construct()
    {
        $this->buss = new ArrayCollection();
    }

    /**
     * @return Collection|bus[]
     */
    public function getBuss()
    {
        return $this->buss;
    }

    public function __toString()
    {
        return $this->getArrivee();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=255)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="arrivee", type="string", length=255)
     */
    private $arrivee;


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
     * Set depart
     *
     * @param string $depart
     *
     * @return ligne
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set arrivee
     *
     * @param string $arrivee
     *
     * @return ligne
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    /**
     * Get arrivee
     *
     * @return string
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }
}

