<?php

namespace cff\Entity\Usuario;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;
    /** @ORM\Column(type="string") */

    protected $emil;
    /** @ORM\Column(type="string") */

    protected $password;
    /** @ORM\Column(type="string") */

    protected $nome;
    /** @ORM\Column(type="integer") */

    protected $perfil;
    /**
     * @ORM\ManyToOne(targetEntity="cff\Entity\Familia\Familia")
     * @ORM\JoinColumn(referencedColumnName="id")
     **/
    public $familia;

    /** @ORM\Column(type="integer") */
    public $status;

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
    public function getEmil()
    {
        return $this->emil;
    }

    /**
     * @param mixed $emil
     */
    public function setEmil($emil)
    {
        $this->emil = $emil;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
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