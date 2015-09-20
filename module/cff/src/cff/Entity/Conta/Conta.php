<?php
namespace cff\Entity\Conta;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
*@ORM\Table(name="contas")
*/
class Conta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")\
     */
    public $id;

    /** @ORM\Column(type="string") */
    protected $numero;

    /** @ORM\Column(type="integer") */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="cff\Entity\Banco\Banco",     cascade={"persist", "remove"} )
     * @ORM\JoinColumn(referencedColumnName="id")
     **/
    protected $banco;

    /**
     * @ORM\ManyToOne(targetEntity="cff\Entity\Familia\Familia",     cascade={"persist", "remove"} )
     * @ORM\JoinColumn(referencedColumnName="id")
     **/
    protected $familia;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param mixed $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    /**
     * @return mixed
     */
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param mixed $familia
     */
    public function setFamilia($familia)
    {
        $this->familia = $familia;
    }





}