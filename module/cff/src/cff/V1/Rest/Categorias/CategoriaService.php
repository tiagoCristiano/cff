<?php

namespace cff\V1\Rest\Categorias;



use cff\V1\Rest\AbstractService\AbstractService;

class CategoriaService extends AbstractService
{


    public function __construct($em, $hydrator, $categoriaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Categoria\Categoria';
        $this->entity = $categoriaEntity;

    }

    public function create($data)
    {
        $categoria = new $this->entity();
        $familia = $this->em->getRepository('cff\Entity\Familia\Familia')->findBy(array('id' =>$data->familia_id));
        $categoria->setFamilia($familia[0]);
        $categoria->setStatus(1);
        $categoria->setDataCriacao($this->getDataAtual());
        $this->hydrate($categoria,$data);
        $this->em->persist($categoria);
        $this->em->flush();
        return $this->extract($categoria);
    }

    public function getAll($familiaId)
    {
        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia = :id and u.status = 1');
        $query->setParameter('id', $familiaId);
        $categorias = $query->getResult();
        if(!is_null($categorias)) {
            return  $this->padronizaRetorno($categorias);
        }
        return false;
    }

    public function findById($id)
    {
        $entity = $this->em->getRepository($this->repository)
                           ->findBy(array('status' => 1,'id' => $id ));
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    private function padronizaRetorno($entity)
    {
        $data = array();
        foreach($entity as $categoria) {
            $data[] = array(
                'id'   => $categoria->getId(),
                'categoria'   => $categoria->getCategoria(),
                'tipo'   => $categoria->isTipo(),
            );

        }
        return $data;
    }


}