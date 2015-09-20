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
        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia = :id and u.status = 1');
        $query->setParameter('id', $familiaId);
        $contas = $query->getResult();

        if(!is_null($contas)) {
            return  $this->padronizaRetorno($contas);
        }
        return false;
    }

    public function save($data)
    {
        $banco = $this->em->getRepository('cff\Entity\Banco\Banco')->find((int)$data->banco_id);
        die(var_dump($banco));
        $this->entity->setBanco($banco[0]);
        $this->hydrate($this->entity,$data);
        die(var_dump($this->entity));
        $this->em->persist($entity);
        $this->em->flush();
        return $this->extract($entity);
    }


    protected function padronizaRetorno($contas)
    {
        $data = array();
        foreach($contas as $conta) {
            $data[] = array(
                'id' => $conta->getId(),
                'numero' =>$conta->getNumero(),
                'status' => $conta->getStatus(),
                'banco' => array(
                    'id' => $conta->getBanco()->getId(),
                    'nome' => $conta->getBanco()->getNome(),
                    'agencia' => $conta->getBanco()->getAgencia(),
                ),
                'familia' => array(
                    'id' =>$conta->getFamilia()->getId(),
                    'nome' =>$conta->getFamilia()->getNome()

                )
            );
        }
        return $data;

    }

}