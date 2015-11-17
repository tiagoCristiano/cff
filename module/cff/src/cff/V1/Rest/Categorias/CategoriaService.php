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

    public function getCategoriasDespesas($parametros)
    {

//        $data = new \DateTime($this->getDataAtual());
//        $data = $data->format('y-m-d');
        $qb = $this->em->createQueryBuilder();

        $query = $this->em->createQuery('
                                        SELECT COUNT(categorias.id)  qtdCategoria, categorias.categoria
                                        FROM '. $this->repository.' categorias
                                        JOIN cff\Entity\Despesa\Despesa despesas WITH despesas.categoria = categorias.id
                                        GROUP BY categorias.categoria');


                        $results = $query->getResult();
//
//
//
//
//                                            die(var_dump($results));
//
//
//
//        $qb->select('c.categoria, COUNT(c.id)')
//            ->from($this->repository, 'c')
//            ->join('t2p.tags', 't')
//            ->where($qb->expr()->eq('c.familia', ':familiaId'))
//            ->andWhere($qb->expr()->eq('c.status', '1'))
//            ->groupBy('c.categoria')
//            JOIN `despesas` ON `despesas`.`categorias_id` = `categorias`.`id`
////            ->add('where', $qb->expr()->between(
////                'u.dataCriacao',
////                ':de',
////                ':ate'
////            )
////            )
//            ->setParameters(array('familiaId' => $parametros->familia_id));
//        $query = $qb->getQuery();
//        $results = $query->getResult();
//        die(var_dump($results));
//            //->setParameters(array('de' => "{$data} 00:08:00", 'ate' => "{$data} 17:59:59"));









//        SELECT COUNT(`categorias`.id), categorias.`categoria` AS qtdCategoria
//    FROM categorias
//    JOIN `despesas` ON `despesas`.`categorias_id` = `categorias`.`id`
//    GROUP BY categorias.`categoria`
//        die(var_dump($parametros));

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