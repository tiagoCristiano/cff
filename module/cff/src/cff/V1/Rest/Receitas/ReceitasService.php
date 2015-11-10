<?php

namespace cff\V1\Rest\Receitas;


class ReceitasService
{
    public function __construct($em, $hydrator, $receitaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Receitas\Receitas';
        $this->entity     = $receitaEntity;
    }

    public function fetchAll($familiaId)
    {
        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'familia' => $familiaId ));
        if(!empty($entity)){
            return $entity;
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

}