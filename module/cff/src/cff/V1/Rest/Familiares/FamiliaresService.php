<?php

namespace cff\V1\Rest\Familiares;


use cff\V1\Rest\AbstractService\AbstractService;
use cff\V1\Rest\Register\RegisterService;

class FamiliaresService extends AbstractService
{
    protected $em;
    protected $hydrator;
    protected $repository;
    protected $familiaresEntity;
    protected $registerService;

    public function __construct($em, $hydrator, RegisterService $registerService)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->registerService = $registerService;
    }

    public function create($data)
    {

        $result = $this->registerService->createUser($data);

        if($result) {
            return $result;
        }
        else {
            return false;
        }
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

    public function insetFamiliarInFamilia($idFamilia)
    {
        $familiaresEntity = new $this->entity();
        $familia = $this->em->getRepository('cff\Entity\Familia\Familia')->findBy(array('id' =>$idFamilia));
        $familiaresEntity->setFamilia($familia[0]);
        $this->hydrate($familiaresEntity,$familia);
        $this->em->persist($familiaresEntity);
        $this->em->flush();
        return $this->extract($familiaresEntity);

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