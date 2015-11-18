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
                'data_vencimento' => $dateVencimento->format('d/m/Y'),
                'data_criacao'    => $dataCriacao->format('d/m/Y'),
                'id' => $despesa->getId(),
                'valor' => $despesa->getValor(),
                'descricao' => $despesa->getDescricao(),
                'user' => $despesa->getUser()->getNome(),
                'valor' => $despesa->getValor(),
                'conta' => $despesa->getConta()->getNumero(),
                'pago' => ($despesa->isPago()) ? 'Pago' : 'A pagar',
                'totalDespesas' => $total,
                'categoria' => $despesa->getCategoria()->getCategoria(),
                'banco' => $despesa->getConta()->getBanco()->getNome()
            );
            unset($date);

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
