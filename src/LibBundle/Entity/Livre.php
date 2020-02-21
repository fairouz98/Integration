<?php

namespace LibBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="LibBundle\Repository\LivreRepository")
 */
class Livre
{
    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    public function get_class(){
        return $this->get_class();
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="LibBundle\Entity\Categorie", inversedBy="livres")
     */
    private $categorie;
    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     * @Assert\Length(
     *      min = 3,
     *      max = 15,
     *      minMessage = "le nom de l'événement doit comporter au moins 3 caractères",
     *      maxMessage = "le nom de l'événement ne doit pas dépasser les {{limit}} 15 caractères"
     *
     * )
     ** @Assert\NotNull(message="Le nom del'evenement doit etre non null ")
     */
    private $titre;

     /**
     * @var string
     *
     * @ORM\Column(name="disponible", type="string", length=255)
      * @Assert\Length(
      *      min = 3,
      *      max = 6,
      *      minMessage = "le nom de l'événement doit comporter au moins 3 caractères",
      *      maxMessage = "le nom de l'événement ne doit pas dépasser les {{limit}} 6 caractères"
      *
      * )
      ** @Assert\NotNull(message="Le nom del'evenement doit etre non null ")
     */
    private $disponible;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
    /**
     * Get disponible
     *
     * @return string
     */
    public function getDisponible()
    {
        return $this->disponible;
    }
    /**
     * Set disponible
     *
     * @param string $disponible
     *
     * @return disponible
     */
    public function setDisponible($titre)
    {
        $this->disponible = $titre;

        return $this;
    }

    public function __toString()
    {

        return $this->getTitre() ;
    }
}

