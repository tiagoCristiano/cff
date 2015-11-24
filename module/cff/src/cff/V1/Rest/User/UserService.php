<?php
namespace cff\V1\Rest\User;


use cff\Entity\Familia\Familia;
use cff\V1\Rest\AbstractService\AbstractService;
use cff\V1\Rest\Familia\FamiliaService;
use cff\V1\Rest\Register\RegisterService;

class UserService extends AbstractService
{
    /**
     * @var $familiaRepository
     */
    protected $familiaService;

    protected $registerService;


    public function __construct($em, $hydrator, $userEntity,$familiaService)
    {
        $this->repository = 'cff\Entity\Usuario\Usuario';
        $this->entity = $userEntity;
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->familiaService = $familiaService;
        $this->familiaRepository = 'Cff\Entity\Familia\Familia';
    }

    public function getByFamilia($familiaId)
    {

        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia = :id and u.status = 1');
        $query->setParameter('id', $familiaId);
        $users = $query->getResult();


        if(!is_null($users)) {
            return  $this->padronizaAllUsers($users);
        }
        return false;
    }

    public function atualizaFamilia($idUSer, $idFamilia)
    {
        $data = array('familia_id'=> $idFamilia);
        return self::update($idUSer, $data);
    }



    public function update($id, $data)
    {
        $this->entity = $this->em->getRepository($this->repository)->find($id);
        $familiaEntity = $this->em->getRepository($this->familiaRepository)->find($data['familia_id']);
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
            'perfil' => ($this->entity->getPerfil()->id == 1) ? 'Administrador ' : 'Familiar',
            'familia' => array(
                'id' => $this->entity->getFamilia()->getId(),
                'nome' => $this->entity->getFamilia()->getNome(),
                'qtdMembros' => $this->entity->getFamilia()->getQtdMembros(),
                'status' => $this->entity->getFamilia()->getStatus()
            )
        );
        return $data;
    }

    public function padronizaAllUsers($user){
        $data = array();

        foreach($user as $entidade) {
            $data[] = array(
                'id'   => $entidade->getId(),
                'nome' => $entidade->getNome(),
                'status'  => $entidade->getStatus(),
                'familia' => array(
                    'id'   =>$entidade->getFamilia()->getId(),
                    'nome'   =>$entidade->getFamilia()->getNome(),
                ),
                'perfil' => ($entidade->getPerfil()->getId() == 1) ? 'Administrador' : 'Familiar'

            );
        }


        return $data;
    }


    public function getUsuarioDespesas($de, $ate, $familia)
    {
        $de = $this->padronizaData($de);
        $ate = $this->padronizaData($ate);

        $qb = $this->em->createQueryBuilder();

        $query = $this->em->createQuery('
                                        SELECT
                                          COUNT(usuarios.id) ,
                                          SUM(despesas.valor) as qtdCategoria,
                                          usuarios.nome
                                        FROM '. $this->repository.' usuarios
                                        JOIN cff\Entity\Despesa\Despesa despesas WITH despesas.user = usuarios.id
                                        WHERE despesas.familia = ?3
                                        AND despesas.dataCriacao BETWEEN ?1 AND ?2
                                        AND despesas.status = 1
                                        GROUP BY usuarios.nome');

        $query->setParameter(1, $de);
        $query->setParameter(2, $ate);
        $query->setParameter(3, $familia);
        $results = $query->getResult();
        $results =  $this->padronizaRetornoUser($results);
        return $results;

    }

    private function padronizaRetornoUser($results)
    {


        $data = array();
        foreach($results as $categoria) {

            $data ['categoria'] .=  $categoria['nome'].",";

            $data ['qtd']       .= (int)$categoria['qtdCategoria'].',';

        }


        $qtd    = substr_replace($data ['qtd'], "", -1);
        $labels = substr_replace($data ['categoria'] , "", -1);
        $labels = str_replace("\'","",$labels);
        $labels = trim($labels);
        $qtd    = trim($qtd);

        unset($data);
        $data['usuarios']['labelsUsuario'] = $labels;
        $data['usuarios']['dataUsuario'] = $qtd;
        return $data;
    }


}