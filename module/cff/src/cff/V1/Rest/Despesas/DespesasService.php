<?php

namespace cff\V1\Rest\Despesas;

use cff\V1\Rest\AbstractService\AbstractService;
use cff\V1\Rest\Contas\ContaService;

class DespesasService extends AbstractService
{
    protected $contaService;

    public function __construct($em, $hydrator, $despesaEntity, ContaService $contaService)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Despesa\Despesa';
        $this->entity     = $despesaEntity;
        $this->contaService = $contaService;
    }

    public function save($data)
    {

        $date = $this->padronizaData($data->dataVencimentoDespesa);
        $conta     = $this->em->getRepository('cff\Entity\Conta\Conta')->find($data->contaId);
        $categoria = $this->em->getRepository('cff\Entity\Categoria\Categoria')->find($data->categoriaId);
        $usuCad    = $this->em->getRepository('cff\Entity\Usuario\Usuario')->find($data->idUser);
        $familia    = $this->em->getRepository('cff\Entity\Familia\Familia')->find($data->idFamilia);
        $this->em->persist($this->entity);
        $this->entity->setConta($conta);
        $this->entity->setFamilia($familia);
        $this->entity->setStatus(true);
        $this->entity->setDataVencimento(($date));
        $this->entity->setDataCriacao($this->getDataAtual());
        $this->entity->setPago(0);
        if($data->isPago){
            $this->entity->setPago(1);
        }

        $this->entity->setCategoria($categoria);
        $this->entity->setUser($usuCad);
        $this->hydrate($this->entity,$data);
        try{
            $this->em->flush();
            if($data->isPago) {
                $this->contaService->debita($data->contaId, $data->valor);
            }
            return $this->extract($this->entity);
        }catch (\Exception $e) {
            die(var_dump($e->getMessage()));
        }


    }

    public function update($id, $data)
    {



        $dataVencimeto = $this->padronizaData($data->despesa['data_vencimento_despesa']);
        $idFamilia = isset($data->idFamilia) ? $data->idFamilia : $data->despesa['idFamilia'];
        $idConta   = isset($data->contaObj['id']) ? $data->contaObj['id'] : $data->despesa['contaObj']['id'];

        $this->entity  = $this->em->getRepository($this->repository)->find($id);

        $familiaEntity = $this->em->getRepository('cff\Entity\Familia\Familia')->find($idFamilia);

        $contaEntity   = $this->em->getRepository('cff\Entity\Conta\Conta')->find($idConta);
        $user           = $this->em->getRepository('cff\Entity\Usuario\Usuario')->find($data->despesa['userObj']['id']);

        $this->entity->setFamilia($familiaEntity);
        $this->entity->setDataVencimento($dataVencimeto);
        $this->entity->setConta($contaEntity);
        $this->entity->setUser($user);
        $this->entity->setPago($data->pago);
        $this->em->persist($this->entity);
        $this->hydrate($this->entity, $data->despesa);

        try{
            $this->em->flush();
            return $this->extract($this->entity);
            return ($this->padronizaRetorno( $this->entity));
        }catch (\Exception $e) {
            die(var_dump($e->getMessage()));
        }


    }



    public function getByIdFamilia($idFamilia)
    {

        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'familia' => $idFamilia ));
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    private function padronizaRetorno($despesas)
    {
        $data = array();
        $total = 0;
        $i =0;

        foreach($despesas as $despesa){

            $total += $despesa->getValor();

            $data[$i] = array(
                $dateVencimento = new \DateTime($despesa->getDataVencimento()),
                $dataCriacao    = new \DateTime($despesa->getDataCriacao()),
                'data_vencimento_despesa' => $dateVencimento->format('d/m/Y'),
                'data_criacao_despesa'    => $dataCriacao->format('d/m/Y'),
                'id' => $despesa->getId(),
                'valor' => $despesa->getValor(),
                'descricao' => $despesa->getDescricao(),
                'userNome' => $despesa->getUser()->getNome(),
                'userObj' => $despesa->getUser(),
                'valor' => $despesa->getValor(),
                'contaNumero' => $despesa->getConta()->getNumero(),
                'pago' => ($despesa->isPago()) ? 'Pago' : 'A pagar',
                'totalDespesas' => $total,
                'categoriaNome' => $despesa->getCategoria()->getCategoria(),
                'categoriaObj' => $despesa->getCategoria(),
                'banco' => $despesa->getConta()->getBanco()->getNome(),
                'contaObj' => $despesa->getConta(),
                'idFamilia' => $despesa->getFamilia()->getId()
            );
            unset($dateVencimento);
            unset($dataCriacao);

            $i++;

        }

       return $data;

    }

    public function getByFamilia($familiaId)
    {
        $query = $this->em->createQuery('SELECT u FROM '.$this->repository.' u where u.familia = :id and u.status = 1');
        $query->setParameter('id', $familiaId);
        $familia = $query->getResult();
        if(!is_null($familia)) {
            return  $this->padronizaRetorno($familia);
        }
        return false;
    }

    public function getById($id)
    {
        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'id' => $id ));

        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }




}
