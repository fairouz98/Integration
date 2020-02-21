<?php

namespace LibBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rech
 *
 * @ORM\Table(name="rech")
 * @ORM\Entity(repositoryClass="LibBundle\Repository\rechRepository")
 */
class rech
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

