<?php
namespace cff\Entity\Despesa;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity
 *@ORM\Table(name="despesas")
 */
class Despesa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(name="valor",type="float",nullable=false)
     *
     */
    protected  $valor;

    /**
     * @ORM\Column(type="string")
     */
    protected $descricao;

    /**
     * @var \DateTime
     * * @ORM\Column(name="data_criacao", type="string", nullable=false)
     */
    protected $dataCriacao;

    /**
     * @var \DateTime
     * * @ORM\Column(name="data_vencimento", type="string", nullable=false)
     */
    protected $dataVencimento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pago", type="boolean", nullable=false)
     */
    protected $pago;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    protected $status;


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
     * @return Despesa
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Despesa
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
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
     * @return Despesa
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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
     * @return Despesa
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param \DateTime $dataVencimento
     * @return Despesa
     */
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPago()
    {
        return $this->pago;
    }

    /**
     * @param boolean $pago
     * @return Despesa
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
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
     * @return Despesa
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
     * @return Despesa
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
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
     * @return Despesa
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
     * @return Despesa
     */
    public function setFamilia($familia)
    {
        $this->familia = $familia;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     * @return Despesa
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }





















}