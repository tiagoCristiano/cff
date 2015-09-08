<?php

namespace cff\V1\Rest\Banco;


use cff\V1\Rest\AbstractService\AbstractService;
use Doctrine\ORM\Query as Query;

class BancoService extends AbstractService
{


    public function __construct($em, $hydrator, $bancoEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Banco\Banco';
        $this->entity = $bancoEntity;
    }

    public function getById($id)
    {

        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'id' => $id ));

        if(!empty($entity)) {
             return $this->extract($entity[0]);
        }
        return false;
    }

    public function getAll()
    {

        $entity = $this->em->getRepository($this->repository)
            ->findAll(Query::HYDRATE_ARRAY);
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }


    public function padronizaRetorno($entity)
    {
        $data = array(
            'id'   => $entity[0]->getId(),
            'nome' => $entity[0]->getNome(),
            'agencia' => $entity[0]->getAgencia(),
            'status'  => $entity[0]->getStatus(),
            'familia' => array(
                'id'   =>$entity[0]->getFamilia()->getId(),
                'nome' =>$entity[0]->getFamilia()->getNome(),
                'qtdMembros' => $entity[0]->getFamilia()->getQtdMembros(),
                'status' => $entity[0]->getFamilia()->getStatus(),
            )
        );

        return $data;
    }

}