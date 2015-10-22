<?php

namespace cff\V1\Rest\Register;

use cff\Entity\Perfil\Perfil;
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
        $this->perfilRepository = 'Cff\Entity\Perfil\Perfil';
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
            $this->em->persist($this->entity);
            $familiaEntity = $this->em->getRepository($this->familiaRepository)->find($data->familia_id);
            $perfil = new Perfil();
            $perfil->setId($data->perfil);

            $perfilEntity = $this->em->getRepository($this->perfilRepository)->findBy(array('id' =>$data->perfil));
            $perfilEntity = $this->em->find($this->perfilRepository, $data->perfil);

            $this->entity->setFamilia($familiaEntity);
            $this->em->persist($this->entity);

            $this->entity->setPerfil($perfil);

            $this->entity->setPassword($this->generateRandomPassword());

            $this->hydrate($this->entity, $data);
           try{
                $this->em->flush();
            } catch(\Exception $e) {
                die(var_dump($e->getMessage()));
            }

            $this->mailService->sendRegisterMail($this->extract($this->entity));
            return $this->extract($this->entity);
        } else {
            return false;
        }
    }


    public function validaDuplicidade($email)
    {
        $email = $this->em->getRepository('cff\Entity\Usuario\Usuario')->findBy(array('email' =>$email));
        if(empty($email[0])) {
            return true;
        }
        return false;
    }

    protected function generateRandomPassword()
    {
        $passWord = Rand::getString(6, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXZKWY1234567890', true);
        return $passWord;
    }







}