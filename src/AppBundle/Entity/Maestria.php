<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 07/07/2015
 * Time: 16:26
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="maestria")
 * @ORM\Entity()
 */
class Maestria extends ActividadCientifica{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $edicion;

    public function __toString(){
        return 'Maestría ('.$this->getNombre().' - Edición: '.$this->getEdicion().')';
    }

    /**
     * Set Edicion
     *
     * @param string $edicion
     * @return Maestria
     */
    public function setEdicion($edicion)
    {
        $this->edicion = $edicion;

        return $this;
    }

    /**
     * Get Edicion
     *
     * @return string 
     */
    public function getEdicion()
    {
        return $this->edicion;
    }
}
