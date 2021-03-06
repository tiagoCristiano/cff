<?php

namespace cff\Entity\Banco;

use Doctrine\ORM\Mapping as ORM;
use cff\Entity\Familia\Familia;

/** @ORM\Entity */
class Banco
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")\
     */
    public $id;

    /** @ORM\Column(type="string") */
    public $nome;

    /** @ORM\Column(type="string") */
    public $agencia;

    /** @ORM\Column(type="integer") */
    public $status;

    /**
     * @ORM\ManyToOne(targetEntity="cff\Entity\Familia\Familia")
     * @ORM\JoinColumn(referencedColumnName="id")
     **/
    public $familia;

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
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
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param mixed $familia
     */
    public function setFamilia(Familia $familia)
    {
        $this->familia = $familia;
    }



}