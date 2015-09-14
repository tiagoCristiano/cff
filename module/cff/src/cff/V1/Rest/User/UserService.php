<?php
namespace cff\V1\Rest\User;


use cff\V1\Rest\AbstractService\AbstractService;

class UserService extends AbstractService
{


    public function __construct($em, $hydrator, $userEntity)
    {
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->entity = $userEntity;
        $this->em = $em;
        $this->hydrator = $hydrator;
    }


    public function getByFamilia($familiaId)
    {
        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia = :id and u.status = 1');
        $query->setParameter('id', $familiaId);
        $users = $query->getResult();
        if(!is_null($users)) {
            return  $this->padronizaRetorno($users);
        }
        return false;
    }


    public function padronizaRetorno($entity)
    {
        $data = array();
        foreach($entity as $entidade) {
            $data[] = array(
                'id'   => $entidade->getId(),
                'nome' => $entidade->getNome(),
                'perfil' => ($entidade->getPerfil() == 1) ? 'Administrador ' : 'Familiar',
                'familia' => array(
                    'id'   =>$entidade->getFamilia()->getId(),
                    'nome' =>$entidade->getFamilia()->getNome(),
                    'qtdMembros' => $entidade->getFamilia()->getQtdMembros(),
                    'status' => $entidade->getFamilia()->getStatus()
                ),
            );
        }
        return $data;
    }



}