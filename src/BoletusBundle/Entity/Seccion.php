<?php

namespace BoletusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seccion
 */
class Seccion
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
    private $categorias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Seccion
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
     * Add categorias
     *
     * @param \BoletusBundle\Entity\Categoria $categorias
     * @return Seccion
     */
    public function addCategoria(\BoletusBundle\Entity\Categoria $categorias)
    {
        $this->categorias[] = $categorias;

        foreach ($this->categorias as $categoria) {
            $categoria->setSeccion($this);
        }

        return $this;
    }

    /**
     * Remove categorias
     *
     * @param \BoletusBundle\Entity\Categoria $categorias
     */
    public function removeCategoria(\BoletusBundle\Entity\Categoria $categorias)
    {
        $this->categorias->removeElement($categorias);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }
}
