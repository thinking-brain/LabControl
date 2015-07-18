<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 07/07/2015
 * Time: 16:22
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="analisis_muestra")
 * @ORM\Entity()
 */
class AnalisisMuestra {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     *
     */
    protected $aprobado;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $resultado;

    /**
     * @var muestra
     * @ORM\ManyToOne(targetEntity="Muestra", inversedBy="analisisMuestras")
     * @ORM\JoinColumn(name="muestraId", referencedColumnName="id")
     */
    protected $muestra;

    /**
     * @var analisis
     * @ORM\ManyToOne(targetEntity="Analisis", inversedBy="analisisMuestras")
     * @ORM\JoinColumn(name="analisisId", referencedColumnName="id")
     */
    protected $analisis;

    /**
     * @var tecnicoLaboratorio
     * @ORM\ManyToOne(targetEntity="TecnicoLaboratorio", inversedBy="analisisMuestras")
     * @ORM\JoinColumn(name="tecnicoLaboratorioId", referencedColumnName="id")
     */
    protected $tecnicoLaboratorio;

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
     * Set Aprobado
     *
     * @param boolean $aprobado
     * @return AnalisisMuestra
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get Aprobado
     *
     * @return boolean 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set Resultado
     *
     * @param string $resultado
     * @return AnalisisMuestra
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get Resultado
     *
     * @return string 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set Muestra
     *
     * @param \AppBundle\Entity\Muestra $muestra
     * @return AnalisisMuestra
     */
    public function setMuestra(\AppBundle\Entity\Muestra $muestra = null)
    {
        $this->muestra = $muestra;

        return $this;
    }

    /**
     * Get Muestra
     *
     * @return \AppBundle\Entity\Muestra 
     */
    public function getMuestra()
    {
        return $this->muestra;
    }

    /**
     * Set Analisis
     *
     * @param \AppBundle\Entity\Analisis $analisis
     * @return AnalisisMuestra
     */
    public function setAnalisis(\AppBundle\Entity\Analisis $analisis = null)
    {
        $this->analisis = $analisis;

        return $this;
    }

    /**
     * Get Analisis
     *
     * @return \AppBundle\Entity\Analisis 
     */
    public function getAnalisis()
    {
        return $this->analisis;
    }

    /**
     * Set TecnicoLaboratorio
     *
     * @param \AppBundle\Entity\TecnicoLaboratorio $tecnicoLaboratorio
     * @return AnalisisMuestra
     */
    public function setTecnicoLaboratorio(\AppBundle\Entity\TecnicoLaboratorio $tecnicoLaboratorio = null)
    {
        $this->tecnicoLaboratorio = $tecnicoLaboratorio;

        return $this;
    }

    /**
     * Get TecnicoLaboratorio
     *
     * @return \AppBundle\Entity\TecnicoLaboratorio 
     */
    public function getTecnicoLaboratorio()
    {
        return $this->tecnicoLaboratorio;
    }
}
