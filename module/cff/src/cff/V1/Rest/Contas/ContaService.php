<?php

namespace cff\V1\Rest\Contas;


use cff\Entity\Banco\Banco;
use cff\V1\Rest\AbstractService\AbstractService;

class ContaService extends AbstractService
{

    public function __construct($em,$hydrator, $contaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Conta\Conta';
        $this->entity = $contaEntity;
    }

    public function getByFamilia($familiaId)
    {
        $query = $this->em->createQuery(
                                   "SELECT
                                          u
                                    FROM {$this->repository} u
                                     WHERE u.familia = :id
                                     AND u.status = 1");
        $query->setParameter('id', $familiaId);
        $contas = $query->getResult();

        if(!is_null($contas)) {
            return  $this->padronizaRetorno($contas);
        }
        return false;
    }

    public function save($data)
    {
        $banco   = $this->em->getRepository('cff\Entity\Banco\Banco')->find($data->banco_id);
        $familia = $this->em->getRepository('cff\Entity\Familia\Familia')->find($data->familia_id);
        $this->entity->setBanco($banco);
        $this->entity->setFamilia($familia);
        $this->hydrate($this->entity,$data);
        $this->em->persist($this->entity);
        $this->em->flush();
        return $this->extract($this->entity);
    }


    protected function padronizaRetorno($contas)
    {
        $data = array();
        foreach($contas as $conta) {
            $data[] = array(
                'id' => $conta->getId(),
                'numero' =>$conta->getNumero(),
                'status' => $conta->getStatus(),
                'saldo' => $conta->getSaldo(),
                'banco' => $conta->getBanco()->getNome(),
                'familia' => array(
                    'id' =>$conta->getFamilia()->getId(),
                    'nome' =>$conta->getFamilia()->getNome()

                )
            );
        }
        return $data;
    }

    public function debita($conta, $valor)
    {
        $contaEntity = $this->em->getRepository($this->repository)
            ->findBy(array('id' => $conta ));
        $data['saldo'] = $contaEntity[0]->getSaldo() - $valor;
        self::update($conta,$data);

    }

    public function credita($conta, $valor)
    {

        $contaEntity = $this->em->getRepository($this->repository)
            ->findBy(array('id' => $conta ));

        $data['saldo'] = $contaEntity[0]->getSaldo() + $valor;
        self::update($conta,$data);
    }


    public function getContasDespesas($de, $ate, $familia)
    {
        $de = $this->padronizaData($de);
        $ate = $this->padronizaData($ate);


        $query = $this->em->createQuery('
                                        SELECT SUM(despesas.valor)  qtdConta, contas.numero as numeroConta
                                        FROM '. $this->repository.' contas
                                        LEFT JOIN cff\Entity\Despesa\Despesa despesas WITH despesas.conta = contas.id
                                         WHERE despesas.familia = ?3
                                        AND despesas.dataCriacao BETWEEN ?1 AND ?2
                                        AND despesas.status = 1
                                        GROUP BY contas.numero');

        $query->setParameter(1, $de);
        $query->setParameter(2, $ate);
        $query->setParameter(3, $familia);
        $results = $query->getResult();

        $results =  $this->padronizaRetornoContas($results);
        return $results;

    }

    private function padronizaRetornoContas($results)
    {


        $data = array();
        foreach($results as $categoria) {

            $data ['categoria'] .= $categoria['numeroConta'].",";

            $data ['qtd']       .= (int)$categoria['qtdConta'].',';

        }


        $qtd    = substr_replace($data ['qtd'], "", -1);
        $labels = substr_replace($data ['categoria'] , "", -1);
        $labels = str_replace("\'","",$labels);
        $labels = trim($labels);
        $qtd    = trim($qtd);

        unset($data);
        $data['contas']['labelsConta'] = $labels;
        $data['contas']['dataConta'] = $qtd;
        return $data;
    }

}