<?php

namespace LogistiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * foyer
 *
 * @ORM\Table(name="foyer")
 * @ORM\Entity(repositoryClass="LogistiqueBundle\Repository\foyerRepository")
 */
class foyer
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

