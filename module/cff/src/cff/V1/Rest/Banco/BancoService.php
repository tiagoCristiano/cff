<?php

namespace cff\V1\Rest\Banco;


use cff\Entity\Familia\Familia;
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
             return $this->padronizaRetorno($entity);
        }
        return false;
    }


    public function save($data)
    {
        $banco = new $this->entity();
        $familiaEntity = new Familia();
        $familia = $this->em->getReference('cff\Entity\Familia\Familia',$data->familia_id);
        $this->hydrate($familia,$familiaEntity);
        $banco->setFamilia($familia);
        $this->hydrate($banco,$data);
        $this->em->persist($banco);
        $this->em->flush();
        return $this->extract($banco);
    }

    public function getAll($familiaId)
    {
        $entity = $this->em->getRepository($this->repository)
                        ->findBy(array('status' => 1,'id' => $familiaId ));;
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    public function padronizaRetorno($entity)
    {
        $data = array();
        foreach($entity as $entidade) {
            $data[] = array(
                'id'   => $entidade->getId(),
                'nome' => $entidade->getNome(),
                'agencia' => $entidade->getAgencia(),
                'status'  => $entidade->getStatus(),
                'familia' => array(
                    'id'   =>$entidade->getFamilia()->getId(),
                    'nome' =>$entidade->getFamilia()->getNome(),
                    'qtdMembros' => $entidade->getFamilia()->getQtdMembros(),
                    'status' => $entidade->getFamilia()->getStatus()
                ),
            );
        }
        return $data;
    }

    public function getByFamilia($familiaId)
    {
        $familia = $this->em->getReference('cff\Entity\Familia\Familia',$familiaId);
        $this->entity->setFamilia($familia);

        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia_id = :id');
        $query->setParameter('id', $familiaId);
        $familia = $query->getResult();
        die(var_dump( $this->padronizaRetorno($familia) ));
        die(var_dump($familia));

        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'familia'=>$familia->getId() ));;
        if(!empty($entity)) {
            die(var_dump( $this->padronizaRetorno($entity) ));
        }
        return false;

    }


}