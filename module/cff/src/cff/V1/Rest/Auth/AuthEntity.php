<?php
namespace cff\V1\Rest\Auth;

class AuthEntity
{
	public $email;
	public $password;
    public $id;
    public $familias_id;
    public $perfil;

    public function getArrayCopy()
    {
        return array(
            'email' => $this->email,
            'password' => $this->password,
            'id' =>$this->id,
            'familias_id' =>$this->familias_id,
            'perfil' =>$this->perfil
         );
    }

    public function exchangeArray (array $array)
    {
        $this->email = $array['email'];
        $this->password = $array['password'];
        $this->id = $array['id'];
        $this->familias_id = $array['familias_id'];
        $this->perfil = $array['perfil'];
    }
}
