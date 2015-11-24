<?php

namespace cff\V1\Rest\Orcamentos;


class OrcamentosService
{
    public function __construct($em, $hydrator, $orcamentoEntity)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->repository = 'cff\Entity\Orcamento\Orcamento';
        $this->entity     = $orcamentoEntity;
    }

    public function fetchAll($familiaId)
    {
        $entity = $this->em->getRepository($this->repository)
            ->findBy(array('status' => 1,'familia' => $familiaId ));
        if(!empty($entity)) {
            return $this->padronizaRetorno($entity);
        }
        return false;
    }

    public function padronizaRetorno($entity)
    {
        $data = array();
        foreach($entity as $entidade) {
                $dataEdicao = new \DateTime($entidade->getDataEdicao());
                $dataCriacao    = new \DateTime($entidade->getDataCriacao());
            $data[] = [
                'id'   => $entidade->getId(),
                'objetivo' => $entidade->getObjetivo(),
                'duracao' => $entidade->getDuracao(),
                'valor'  => $entidade->getValor(),
                'data_vencimento' => $dataEdicao->format('d/m/Y'),
                'data_inicio'    => $dataCriacao->format('d/m/Y'),
                'status'  => $entidade->getStatus(),
                'conta' =>$entidade->getConta()->getNumero(),
                'user' =>$entidade->getUser()->getNome(),
                'familia' =>$entidade->getFamilia()->getNome(),
                'totalAtingido' => $entidade->getTotalAtingido()

            ];
        }
        return $data;
    }

    public function save($data)
    {

        $familia   =   $this->em->getRepository('cff\Entity\Familia\Familia')->find($data->idFamilia);
        $user      =    $this->em->getRepository('cff\Entity\Usuario\Usuario')->find($data->idUsuario);
        $conta     =   $this->em->getRepository('cff\Entity\Usuario\Usuario')->find($data->idConta);
    }

}