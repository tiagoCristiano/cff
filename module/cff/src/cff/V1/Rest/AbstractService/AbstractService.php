<?php

namespace cff\V1\Rest\AbstractService;


abstract class AbstractService {

    protected $em;
    protected $hydrator;
    protected $repository;
    protected $entity;


    public function __construct($em,$hydrator,$repository, $entity )
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = $repository;
        $this->entity = $entity;
    }

    public function save($data)
    {
        return die(var_dump($data));
        $entity = new $this->entity();
        $this->hydrate($entity,$data);
        $this->em->persist($entity);
        $this->em->flush();
        return $this->extract($entity);
    }

    public function delete($id)
    {
        $entity = $this->em->getReference($this->repository,$id);
        if($entity) {
            $entity->setStatus(0);
            $this->em->flush();
            return true;
        }
        return false;
    }


    public function hydrate($entity, $data) {

        return $this->hydrator->hydrate((array) $data,$entity);
    }
    public function extract($object)
    {
        return $this->hydrator->extract($object);
    }

    public function update($id,$data)
    {
        $entity = $this->em->getRepository($this->repository)
                       ->find($id);
        if (!is_null($entity)) {
            $this->hydrate($entity, $data);
            $this->em->persist($entity);
            $this->em->flush();
            return true;
        }
        return false;

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







}