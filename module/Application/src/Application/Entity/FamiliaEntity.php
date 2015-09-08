<?php
namespace cff\V1\Rest\Familia;
use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity */
class FamiliaEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $nome;

    /** @ORM\Column(type="integer") */
    protected $qtdMembros;

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
    public function getQtdMembros()
    {
        return $this->qtdMembros;
    }

    /**
     * @param mixed $qtdMembros
     */
    public function setQtdMembros($qtdMembros)
    {
        $this->qtdMembros = $qtdMembros;
    }

    public function exchangeArray (array $array)
    {
        $this->id = isset($array['id']) ? $array['id'] : null;
        $this->nome = $array['nome'];
        $this->qtdMembros = $array['qtdMembros'];
    }

}


