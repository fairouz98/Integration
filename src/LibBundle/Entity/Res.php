<?php

namespace LibBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Res
 *
 * @ORM\Table(name="res")
 * @ORM\Entity(repositoryClass="LibBundle\Repository\ResRepository")
 */
class Res
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
     * @var string
     *
     * @ORM\Column(name="r", type="string", length=255)
     */
    private $r;


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
     * Set r
     *
     * @param string $r
     *
     * @return Res
     */
    public function setR($r)
    {
        $this->r = $r;

        return $this;
    }

    /**
     * Get r
     *
     * @return string
     */
    public function getR()
    {
        return $this->r;
    }
}

