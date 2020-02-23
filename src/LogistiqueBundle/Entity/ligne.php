<?php

namespace LogistiqueBundle\Entity;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

