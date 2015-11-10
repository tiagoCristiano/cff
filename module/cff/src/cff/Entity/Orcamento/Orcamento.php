<?php

namespace cff\Entity\Orcamento;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Orcamento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /** @ORM\Column(type="string") */
    protected $objetivo;

    /** @ORM\Column(type="integer") */
    protected $duracao;

    /** @ORM\Column(type="float") */
    protected $valor;

     /**
     * @var \DateTime
     * * @ORM\Column(name="data_criacao", type="string", nullable=false)
     */
    protected $dataCriacao;

    /**
     * @var \DateTime
     * * @ORM\Column(name="data_edicao", type="string", nullable=true)
     */
    protected $dataEdicao;


    /** @ORM\Column(type="integer") */
    protected $status;


    /**
     * @var \DateTime
     * * @ORM\Column(name="total_atingido", type="float", nullable=true)
     */
    protected $totalAtingido;
    /**
     * @var \crm\Entity\Categoria\Categoria
     *
     * @ORM\ManyToOne(targetEntity="\cff\Entity\Usuario\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     *
     * })
     */
    protected $user;


    /**
     * @ORM\ManyToOne(targetEntity="cff\Entity\Familia\Familia",     cascade={"persist", "remove"} )
     * @ORM\JoinColumn(referencedColumnName="id")
     **/
    protected $familia;

    /**
     * @var \crm\Entity\Conta\Conta
     *
     * @ORM\ManyToOne(targetEntity="\cff\Entity\Conta\Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contas_id", referencedColumnName="id",onDelete="CASCADE")
     *
     * })
     */
    protected $conta;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Orcamento
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * @param mixed $objetivo
     * @return Orcamento
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * @param mixed $duracao
     * @return Orcamento
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     * @return Orcamento
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * @param \DateTime $dataCriacao
     * @return Orcamento
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataEdicao()
    {
        return $this->dataEdicao;
    }

    /**
     * @param \DateTime $dataEdicao
     * @return Orcamento
     */
    public function setDataEdicao($dataEdicao)
    {
        $this->dataEdicao = $dataEdicao;
        return $this;
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
     * @return Orcamento
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalAtingido()
    {
        return $this->totalAtingido;
    }

    /**
     * @param mixed $totalAtingido
     * @return Orcamento
     */
    public function setTotalAtingido($totalAtingido)
    {
        $this->totalAtingido = $totalAtingido;
        return $this;
    }

    /**
     * @return \crm\Entity\Categoria\Categoria
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \crm\Entity\Categoria\Categoria $user
     * @return Orcamento
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
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
     * @return Orcamento
     */
    public function setFamilia($familia)
    {
        $this->familia = $familia;
        return $this;
    }

    /**
     * @return \crm\Entity\Conta\Conta
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param \crm\Entity\Conta\Conta $conta
     * @return Orcamento
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
        return $this;
    }



}