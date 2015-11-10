<?php

namespace cff\Entity\Receitas;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Receitas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /** @ORM\Column(type="string") */
    protected $descricao;

    /** @ORM\Column(type="float") */
    protected $valor;

    /** @ORM\Column(type="integer") */
    protected $status;

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
     * @var \crm\Entity\Familia\Familia
     *
     * @ORM\ManyToOne(targetEntity="\cff\Entity\Familia\Familia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="familia_id", referencedColumnName="id",onDelete="CASCADE")
     *
     * })
     */
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
     * @var \crm\Entity\Categoria\Categoria
     *
     * @ORM\ManyToOne(targetEntity="\cff\Entity\Categoria\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorias_id", referencedColumnName="id",onDelete="CASCADE")
     *
     * })
     */
    protected $categoria;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Receita
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     * @return Receita
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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
     * @return Receita
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
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
     * @return Receita
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return Receita
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
     * @return Receita
     */
    public function setDataEdicao($dataEdicao)
    {
        $this->dataEdicao = $dataEdicao;
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
     * @return Receita
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return \crm\Entity\Familia\Familia
     */
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param \crm\Entity\Familia\Familia $familia
     * @return Receita
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
     * @return Receita
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
        return $this;
    }

    /**
     * @return \crm\Entity\Categoria\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param \crm\Entity\Categoria\Categoria $categoria
     * @return Receita
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }





}