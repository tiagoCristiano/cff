<?php

namespace cff\V1\Rest\Auth;
use Zend\Db\TableGateway\TableGateway;
use Zend\Crypt\Password\Bcrypt;

class AuthMapper {

    protected $tableGateway;
    private $bcrypt;

    public function __construct(TableGateway $tableGateway, Bcrypt $bcrypt)
    {
        $this->tableGateway = $tableGateway;
        $this->bcrypt = $bcrypt;
    }

    public function auth(AuthEntity $authEntity)
    {

        $data = $authEntity->getArrayCopy();
        $email    = $data["email"];
        $password = $data["password"];
        $rowSet   = $this->tableGateway->select(array('email' => $email, 'password'=>$password));
        $row = $rowSet->current();


        //todo Criptogragar a senha
        //$securePass = $this->bcrypt->create($row->id);

//        if($this->bcrypt->verify($row->familias_id, $securePass) )
//        {
//            die('È isso ai puto');
//        } else {
//            die('errosss');
//        }

//        $result = array(
//            'id'          => $this->bcrypt->create($row->id),
//            'familias_id' => $this->bcrypt->create($row->familias_id),
//            'perfil'      => $this->bcrypt->create($row->perfil),
//            'message'     => 'Login Efetuado com sucesso!'
//        );


        if ( empty($row) ) {
            return false;
        }

        $result = array(
            'id'          => ($row->id),
            'familia_id'  => isset($row->familia_id) ? $row->familia_id : "0" ,
            'perfil'      => ($row->perfil_id == 1)? 'Administrador' : 'Familiar',
            'nome'        => ($row->nome),
            'message'     => 'Login Efetuado com sucesso!'
        );
        return $result;
    }

}