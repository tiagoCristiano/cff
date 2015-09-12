<?php
namespace cff\V1\Rest\Familia;


use cff\Entity\Familia\Familia as FamiliaEntity;
use cff\V1\Rest\AbstractService\AbstractService;


class FamiliaService extends AbstractService {

    protected $em;
    protected $hydrator;
    protected $repository;

    /**
     * @param $em
     * @param $hydrator
     */
    public function __construct($em, $hydrator)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Familia\Familia';
    }

    /**
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        $familiaEntity = new FamiliaEntity();

        $this->hydrate($familiaEntity,$data);

        if(null == $familiaEntity->getStatus() ) {
            $familiaEntity->setStatus(1);
        }

        if(null == $familiaEntity->getQtdMembros()) {
            $familiaEntity->setQtdMembros(1);
        }

        $this->em->persist($familiaEntity);
        $this->em->flush();
        return $this->extract($familiaEntity);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        $familia = $this->em->getRepository($this->repository)
                             ->find($id);
        if (!is_null($familia)) {
            $this->hydrate($familia, $data);
            $this->em->persist($familia);
            $this->em->flush();
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function getById($id)
    {
        $familia = $this->em->getRepository($this->repository)
                        ->findBy(array('status' => 1,'id' => $id ));
        if(!empty($familia)) {
            return $this->padronizaRetorno($familia);
        }
        return false;
    }

    /**
     * Não efetua o delete, apenas muda o status para 0
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $familia = $this->em->getRepository($this->repository)
                             ->find($id);
        if(!is_null($familia)) {
            $familia->setStatus(0);
            $this->em->persist($familia);
            $this->em->flush();
            return true;
        }
        return false;
    }

    /**
     * @return array|bool
     */
    public function getAll()
    {
        $entity = $this->em->getRepository($this->repository)
            ->findAll();
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    /**
     * @param $entity
     * @return array
     */
    public function padronizaRetorno($entity)
    {
        $data = array();
        foreach($entity as $entidade) {
            $data[] = [
                'id'   => $entidade->getId(),
                'nome' => $entidade->getNome(),
                'qtdMembros' => $entidade->getQtdMembros(),
                'status'  => $entidade->getStatus()
            ];
        }
        return $data;
    }

}