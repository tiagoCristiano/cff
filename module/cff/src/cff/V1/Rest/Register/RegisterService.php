<?php

namespace cff\V1\Rest\Register;

use cff\V1\Rest\AbstractService\AbstractService;

class RegisterService extends AbstractService
{
    protected $em;
    protected $hydrator;
    protected $repository;
    protected $entity;

    public function __construct($em, $hydrator, $registerEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->entity = $registerEntity;
    }

    public function saveAdm($data)
    {
        $validate = $this->validaDuplicidade($data->email);


        if( $validate ) {
            $registerEntity = new $this->entity();
            $this->hydrate($registerEntity,$data);
            $this->em->persist($registerEntity);
            $this->em->flush();
            return $this->extract($registerEntity);
        }

        return false;

    }

    public function saveFamiliar()
    {

    }

    public function validaDuplicidade($email)
    {
        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.email = :email');
        $query->setParameter('email', $email);
        $user = $query->getResult();


        if(empty ($user[0]) ) {
            return  true;
        }
        return false;
    }







}