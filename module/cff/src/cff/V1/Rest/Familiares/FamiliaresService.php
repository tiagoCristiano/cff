<?php

namespace cff\V1\Rest\Familiares;


use cff\V1\Rest\AbstractService\AbstractService;

class FamiliaresService extends AbstractService
{
    protected $em;
    protected $hydrator;
    protected $repository;
    protected $familiaresEntity;

    public function __construct($em, $hydrator, $familiaresEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->entity = $familiaresEntity;
    }

    public function getByFamilia($familiaId)
    {
        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia = :id and u.status = 1');
        $query->setParameter('id', $familiaId);
        $familia = $query->getResult();
        if(!is_null($familia)) {
            return  $this->padronizaRetorno($familia);
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



}