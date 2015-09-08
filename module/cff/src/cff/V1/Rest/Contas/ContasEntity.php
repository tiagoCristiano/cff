<?php
namespace cff\V1\Rest\Contas;

class ContasEntity
{
    public $id;
    public $numero;
	public $Banco;



    public function getArrayCopy()
    {
        return array(
            'id'        => $this->id,
            'numero'    => $this->numero,
            'bancos_id' =>$this->Banco,
         );
    }

    public function exchangeArray (array $array)
    {
        $this->id        = $array['id'];
        $this->numero    = $array['numero'];
        $this->Banco     = $array['bancos_id'];
    }

}
