<?php

namespace cff\V1\Rest\Contas;

use Zend\Db\TableGateway\TableGateway;

class ContasMapper
{
	public $tableGateway;

	public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;      
    }


    public function getConta($id)
    {
        $rowSet   = $this->tableGateway->select(array('id' => $id));
        die(var_dump($rowSet->current()));
    }

}