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
        $this->entity = $this->em->getRepository($this->repository)->find($id);
        $familiaEntity = $this->em->getRepository($this->familiaRepository)->find($data->familia_id);
        $this->entity->setFamilia($familiaEntity);
        $this->hydrate($this->entity, $data);
        $this->em->persist($this->entity);
        $this->em->flush();
        return ($this->padronizaRetornoUsuario());
    }


    public function padronizaRetornoUsuario()
    {
        $data = array(
            'id' => $this->entity->getId(),
            'nome' => $this->entity->getNome(),
            'perfil' => ($this->entity->getPerfil() == 1) ? 'Administrador ' : 'Familiar',
            'familia' => array(
                'id' => $this->entity->getFamilia()->getId(),
                'nome' => $this->entity->getFamilia()->getNome(),
                'qtdMembros' => $this->entity->getFamilia()->getQtdMembros(),
                'status' => $this->entity->getFamilia()->getStatus()
            )
        );
        return $data;
    }
}