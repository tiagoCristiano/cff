<?php
namespace cff\Entity\Familia;
use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity */
class Familia
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

    /** @ORM\Column(type="integer") */
    protected $status;

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


    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    public function exchangeArray (array $array)
    {
        $this->id         = isset($array['id']) ? $array['id'] : null;
        $this->nome       = $array['nome'];
        $this->qtdMembros = $array['qtdMembros'];
        $this->status     = $array['status'];
    }


}


