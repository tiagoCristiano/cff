<?php
namespace cff\V1\Rest\Familia;


use cff\Entity\Familia\Familia as FamiliaEntity;


class FamiliaService {

    protected $em;
    protected $hydrator;
    protected $repository;

    public function __construct($em, $hydrator)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Familia\Familia';
    }

    public function save($data)
    {
        $familiaEntity = new FamiliaEntity();
        $this->hydrate($familiaEntity,$data);
        $this->em->persist($familiaEntity);
        $this->em->flush();
        return $this->extract($familiaEntity);
    }

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

    public function getById($id)
    {
        $familia = $this->em->getRepository($this->repository)
                        ->findBy(array('status' => 1,'id' => $id ));
        if(!empty($familia)) {
            return $this->extract($familia[0]);
        }
        return false;
    }

    public function delete($id)
    {
        $familia = $this->em->getRepository($this->repository)
                             ->find($id);
        if(!is_null($familia)) {
            $this->em->remove($familia);
            $this->em->flush();
            return true;
        }
        return false;
    }


    public function hydrate(FamiliaEntity $familiaEntity, $data) {

        return $this->hydrator->hydrate((array) $data,$familiaEntity);
    }
    public function extract($object)
    {
        return $this->hydrator->extract($object);
    }

}