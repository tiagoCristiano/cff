<?php
namespace cff\Entity\Despesa;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity
 *@ORM\Table(name="contas")
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
     * @ORM\Column(type="float")
     */
    public $valor;

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
     * @var \crm\Entity\Familia\Familia
     *
     * @ORM\ManyToOne(targetEntity="\cff\Entity\Familia\Familia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="familia_id", referencedColumnName="id",onDelete="CASCADE")
     *
     * })
     */
    protected $familia;

















}