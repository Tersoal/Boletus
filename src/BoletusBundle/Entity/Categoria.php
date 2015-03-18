<?php

namespace BoletusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 */
class Categoria
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cajas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cajas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Categoria
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add cajas
     *
     * @param \BoletusBundle\Entity\Caja $cajas
     * @return Categoria
     */
    public function addCaja(\BoletusBundle\Entity\Caja $cajas)
    {
        $this->cajas[] = $cajas;

        foreach ($this->cajas as $caja) {
            $caja->setCategoria($this);
        }

        return $this;
    }

    /**
     * Remove cajas
     *
     * @param \BoletusBundle\Entity\Caja $cajas
     */
    public function removeCaja(\BoletusBundle\Entity\Caja $cajas)
    {
        $this->cajas->removeElement($cajas);
    }

    /**
     * Get cajas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCajas()
    {
        return $this->cajas;
    }
}
