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
                $dateVencimento = new \DateTime($despesa->getDataVencimento()),
                $dataCriacao    = new \DateTime($despesa->getDataCriacao()),
                'data_vencimento' => $dateVencimento->format('d/m/Y'),
                'data_criacao'    => $dataCriacao->format('d/m/Y'),
                'id' => $despesa->getId(),
                'valor' => $despesa->getValor(),
                'descricao' => $despesa->getDescricao(),
                'user' => $despesa->getUser()->getNome(),
                'valor' => $despesa->getValor(),
                'conta' => $despesa->getConta()->getNumero(),
                'pago' => ($despesa->isPago()) ? 'Pago' : 'A pagar',
                'totalDespesas' => $total,
                'categoria' => $despesa->getCategoria()->getCategoria(),
                'banco' => $despesa->getConta()->getBanco()->getNome()
            );
            unset($date);

            $i++;

        }

       return $data;

    }




}

