<?php

namespace cff\V1\Rest\Receitas;


class ReceitasService
{
    public function __construct($em, $hydrator, $receitaEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Receitas\Receitas';
        $this->entity     = $receitaEntity;
    }

    public function fetchAll($familiaId)
    {
        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'familia' => $familiaId ));
        if(!empty($entity)){
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    protected function padronizaRetorno($entity)
    {
        $total = 0;
        $data = array();
        foreach($entity as $receita) {
            $dataLancamento = new \DateTime($receita->getDataCriacao());
            $total += $receita->getValor();
            $data[] = array(

                'id' => $receita->getId(),
                'descricao' =>$receita->getDescricao(),
                'status' => $receita->getStatus(),
                'valor' => $receita->getValor(),
                'conta' => $receita->getConta()->getNumero(),
                'familia' => array(
                    'id' =>$receita->getFamilia()->getId(),
                    'nome' =>$receita->getFamilia()->getNome()
                ),
                'dataLancamento' => $dataLancamento->format('d-m-Y'),
                'usuario' => $receita->getUser()->getNome(),
                'totalReceita' => $total,

            );
        }
        return $data;

    }

}