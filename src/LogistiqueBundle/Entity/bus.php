<?php

namespace LogistiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * bus
 *
 * @ORM\Table(name="bus")
 * @ORM\Entity(repositoryClass="LogistiqueBundle\Repository\busRepository")
 */
class bus
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

