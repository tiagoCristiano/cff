<?php
namespace cff\Entity\Categoria;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
@ORM\Table(name="categorias")
*/
class Categoria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")\
     */
    public $id;
    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=255, nullable=false)
     */
    private $categoria;

    /**
     *
     * @ORM\ManyToOne(targetEntity="cff\Entity\Familia\Familia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="familias_id", referencedColumnName="id")
     * })
     */
    private $familia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo", type="boolean", nullable=false)
     */
    private $tipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="string", nullable=false)
     */
    private $dataCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_edicao", type="string", nullable=true)
     */
    private $dataEdicao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Categoria
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param string $categoria
     * @return Categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
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
     * @return Categoria
     */
    public function setFamilia($familia)
    {
        $this->familia = $familia;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTipo()
    {
        return $this->tipo;
    }

    /**
     * @param boolean $tipo
     * @return Categoria
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
     * @return Categoria
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
     * @return Categoria
     */
    public function setDataEdicao($dataEdicao)
    {
        $this->dataEdicao = $dataEdicao;
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
     * @return Categoria
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }





}