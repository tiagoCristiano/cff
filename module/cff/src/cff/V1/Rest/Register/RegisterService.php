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
            $perfil = $this->em->getRepository($this->perfilRepository)->find(1);
            $registerEntity->setPerfil($perfil);
            $this->hydrate($registerEntity,$data);
            $this->em->persist($registerEntity);
            try{
                $this->em->flush();
                $this->mailService->sendRegisterMail($this->extract($registerEntity));
                return $this->extract($registerEntity);
            } catch(\Exception $e) {
                die(var_dump($e->getMessage()));
            }

        }
        return false;

    }

    public function createUser($data)
    {

        $validate = $this->validaDuplicidade($data->email);

        if( $validate ) {
            $this->em->persist($this->entity);
            $familiaEntity = $this->em->getRepository($this->familiaRepository)->find($data->familia_id);
            $perfilEntity   = $this->em->getRepository($this->perfilRepository)->find(2);
            $this->entity->setFamilia($familiaEntity);
            $this->entity->setPerfil($perfilEntity);
            $this->entity->setPassword($this->generateRandomPassword());
            $this->hydrate($this->entity, $data);
           try{
               $this->em->flush();
               $this->mailService->sendRegisterMail($this->extract($this->entity));
               return $this->extract($this->entity);
            } catch(\Exception $e) {
                die(var_dump($e->getMessage()));
            }
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