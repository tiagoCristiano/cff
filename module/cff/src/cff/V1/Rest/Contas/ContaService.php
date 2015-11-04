<?php

namespace cff\V1\Rest\Contas;


use cff\Entity\Banco\Banco;
use cff\V1\Rest\AbstractService\AbstractService;

class ContaService extends AbstractService
{

    public function __construct($em,$hydrator, $contaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Conta\Conta';
        $this->entity = $contaEntity;
    }

    public function getByFamilia($familiaId)
    {
        $query = $this->em->createQuery(
                                   "SELECT
                                          u
                                    FROM {$this->repository} u
                                     WHERE u.familia = :id
                                     AND u.status = 1");
        $query->setParameter('id', $familiaId);
        $contas = $query->getResult();

        if(!is_null($contas)) {
            return  $this->padronizaRetorno($contas);
        }
        return false;
    }

    public function save($data)
    {
        $banco   = $this->em->getRepository('cff\Entity\Banco\Banco')->find($data->banco_id);
        $familia = $this->em->getRepository('cff\Entity\Familia\Familia')->find($data->familia_id);
        $this->entity->setBanco($banco);
        $this->entity->setFamilia($familia);
        $this->hydrate($this->entity,$data);
        $this->em->persist($this->entity);
        $this->em->flush();
        return $this->extract($this->entity);
    }


    protected function padronizaRetorno($contas)
    {
        $data = array();
        foreach($contas as $conta) {
            $data[] = array(
                'id' => $conta->getId(),
                'numero' =>$conta->getNumero(),
                'status' => $conta->getStatus(),
                'saldo' => $conta->getSaldo(),
                'banco' => $conta->getBanco()->getNome(),
                'familia' => array(
                    'id' =>$conta->getFamilia()->getId(),
                    'nome' =>$conta->getFamilia()->getNome()

                )
            );
        }
        return $data;

    }

}