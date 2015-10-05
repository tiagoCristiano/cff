<?php

namespace cff\V1\Rest\Register;

use cff\V1\Rest\AbstractService\AbstractService;
use cff\V1\Rest\MailService\MailService;
use Zend\Json\Server\Exception\InvalidArgumentException;
use Zend\Math\Rand;



class RegisterService extends AbstractService
{
    protected $em;
    protected $hydrator;
    protected $repository;

    /**
     * @var UserEntity
     */
    protected $entity;

    /**
     * @var string
     */
    protected $familiaRepository;

    /**
     * @var
     */
    protected $mailService;


    public function __construct($em, $hydrator, $registerEntity, MailService $mailService)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->entity = $registerEntity;
        $this->familiaRepository = 'Cff\Entity\Familia\Familia';
        $this->mailService = $mailService;
    }

    public function createAdmin($data)
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

    public function createUser($data)
    {

        $validate = $this->validaDuplicidade($data->email);

        if( $validate ) {
            $familiaEntity = $this->em->getRepository($this->familiaRepository)->find($data->familia_id);
            $this->entity->setFamilia($familiaEntity);
            $this->entity->setPassword($this->generateRandomPassword());
            $this->hydrate($this->entity, $data);
            $this->em->persist($this->entity);
            $this->em->flush();
            //die(var_dump());
            $this->mailService->sendRegisterMail($this->extract($this->entity));
            return $this->extract($this->entity);
        } else {
            return false;
        }
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

    protected function generateRandomPassword()
    {

        $passWord = Rand::getString(6, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXZKWY1234567890', true);
        return $passWord;
    }







}