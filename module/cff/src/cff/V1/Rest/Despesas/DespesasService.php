<?php

namespace cff\V1\Rest\Despesas;

use cff\V1\Rest\AbstractService\AbstractService;

class DespesasService extends AbstractService
{

    public function __construct($em, $hydrator, $despesaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Despesa\Despesa';
        $this->entity     = $despesaEntity;
    }


    public function getByIdFamilia($idFamilia)
    {

        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'familia' => $idFamilia ));
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    private function padronizaRetorno($despesas)
    {
        $data = array();
        $total = 0;
        $i =0;

        foreach($despesas as $despesa){
            $total += $despesa->getValor();

            $data[$i] = array(
                'id' => $despesa->getId(),
                'valor' => $despesa->getValor(),
                'descricao' => $despesa->getDescricao(),
                'user' => $despesa->getUser()->getNome(),
                'data_vencimento' => $despesa->getDataVencimento(),
                'valor' => $despesa->getValor(),
                'pago' => ($despesa->isPago()) ? 'Pago' : 'A pagar',
                'totalDespesas' => $total
            );

            $i++;

        }

       return $data;

    }




}

