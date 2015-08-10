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
        ;
    }

    public function auth(AuthEntity $authEntity)
    {

        $data = $authEntity->getArrayCopy();

        $email    = $data["email"];
        $password = $data["password"];
        $rowSet = $this->tableGateway->select(array('email' => $email, 'password'=>$password));
        $row = $rowSet->current();

        //todo Criptogragar a senha
        $securePass = $this->bcrypt->create($row->id);

//        if($this->bcrypt->verify($row->familias_id, $securePass) )
//        {
//            die('È isso ai seu puto');
//        } else {
//            die('errosss');
//        }


        $result = array(
            'id'          =>$this->bcrypt->create($row->id),
            'familias_id' => $this->bcrypt->create($row->familias_id),
            'perfil'      => $this->bcrypt->create($row->perfil)
        );

        if ( empty($row) ) {
            return false;
        }

        return $result;
    }

}