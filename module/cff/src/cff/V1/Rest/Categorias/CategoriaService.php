<?php

namespace cff\V1\Rest\Categorias;



use cff\V1\Rest\AbstractService\AbstractService;
use crm\Entity\Despesas;

class CategoriaService extends AbstractService
{


    public function __construct($em, $hydrator, $categoriaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Categoria\Categoria';
        $this->entity = $categoriaEntity;

    }

    public function getCategoriasDespesas($de, $ate, $familia)
    {
        $de = $this->padronizaData($de);
        $ate = $this->padronizaData($ate);
        $query = $this->em->createQuery('
                                        SELECT
                                          COUNT(categorias.id) ,
                                          SUM(despesas.valor) as qtdCategoria,
                                          categorias.categoria
                                        FROM '. $this->repository.' categorias
                                        JOIN cff\Entity\Despesa\Despesa despesas WITH despesas.categoria = categorias.id
                                        WHERE despesas.familia = ?3
                                        AND categorias.tipo = 0
                                        AND despesas.dataCriacao BETWEEN ?1 AND ?2
                                        AND despesas.status = 1
                                        GROUP BY categorias.categoria');

        $query->setParameter(1, $de);
        $query->setParameter(2, $ate);
        $query->setParameter(3, $familia);
        $results = $query->getResult();

        $results =  $this->padronizaRetornoCategoria($results);
        return $results;

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

    private function padronizaRetornoCategoria($results)
    {

        $data = array();
        foreach($results as $categoria) {

           $data ['categoria'] .= $categoria['categoria'].",";

           $data ['qtd']       .= (int)$categoria['qtdCategoria'].',';

        }


        $qtd    = substr_replace($data ['qtd'], "", -1);
        $labels = substr_replace($data ['categoria'] , "", -1);
        $labels = str_replace("\'","",$labels);
        $labels = trim($labels);
        $qtd    = trim($qtd);

        unset($data);
        $data['categoria']['labelsCategoria'] = $labels;
        $data['categoria']['dataCategoria'] = $qtd;
        return $data;
    }


}