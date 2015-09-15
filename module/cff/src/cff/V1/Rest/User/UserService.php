<?php
namespace cff\V1\Rest\User;


use cff\Entity\Familia\Familia;
use cff\V1\Rest\AbstractService\AbstractService;
use cff\V1\Rest\Familia\FamiliaService;

class UserService extends AbstractService
{
    /**
     * @var $familiaRepository
     */
    protected $familiaRepository;


    public function __construct($em, $hydrator, $userEntity)
    {
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->entity = $userEntity;
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->familiaRepository = 'cff\Entity\Familia\Familia';
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

    public function insetUserInFamailia($user, $idFamilia)
    {
        $user = $this->getById($user);
        $this->hydrate($this->entity, $user);
        $familia = $this->familiaService->getById($idFamilia);
        $this->entity->setFamilia($familia);
        $this->em->persist($this->entity);
        $this->em->flush();
        return ($this->entity);
    }

    public function update($id, $data)
    {
        $familiaEntity = new Familia();
        $this->entity = $this->em->find($this->repository,array('id'=>$id));

        $familia = $this->em->find($this->familiaRepository, array('id' =>$data->familia_id));

        $this->hydrate($familiaEntity, $familia);


        $this->entity->setFamilia($familiaEntity);

        $this->hydrate($this->entity, $data);
        die(var_dump($familiaEntity->getNome()));

        $this->em->persist($this->entity);

        $this->em->flush();

        return ($this->entity);
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