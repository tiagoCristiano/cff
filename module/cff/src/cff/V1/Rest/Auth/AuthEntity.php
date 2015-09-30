<?php
namespace cff\V1\Rest\Auth;

class AuthEntity
{
    public $email;
    public $password;
    public $id;
    public $familia_id;
    public $perfil;
    public $nome;

    public function getArrayCopy()
    {
        return array(
            'email' => $this->email,
            'password' => $this->password,
            'id' =>$this->id,
            'familia_id' =>$this->familia_id,
            'perfil' =>$this->perfil,
            'nome' => $this->nome
         );
    }

    public function exchangeArray (array $array)
    {
        $this->email = isset($array['email'])? $array['email'] : null;
        $this->password = isset($array['password'])? $array['password'] : null;
        $this->id = isset($array['id'])? $array['id'] : null;
        $this->familia_id = isset($array['familia_id'])? $array['familia_id'] : "0";
        $this->perfil = isset($array['perfil'])? $array['perfil'] : null;
        $this->nome = isset($array['nome'])? $array['nome'] : null;

    }
}
