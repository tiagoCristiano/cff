<?php

namespace cff\V1\Rest\Receitas;


use cff\V1\Rest\AbstractService\AbstractService;

class ReceitasService extends AbstractService
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

    public function save($data)
    {

        $conta     = $this->em->getRepository('cff\Entity\Conta\Conta')->find((int)$data->contaId);

        $categoria = $this->em->getRepository('cff\Entity\Categoria\Categoria')->find($data->categoriaId);
        $usuCad    = $this->em->getRepository('cff\Entity\Usuario\Usuario')->find($data->idUser);
        $familia    = $this->em->getRepository('cff\Entity\Familia\Familia')->find($data->idFamilia);
        $this->em->persist($this->entity);
        $this->entity->setConta($conta);
        $this->entity->setFamilia($familia);
        $this->entity->setStatus(true);
        $this->entity->setDataCriacao($this->getDataAtual());

        $this->entity->setCategoria($categoria);
        $this->entity->setUser($usuCad);

        $this->hydrate($this->entity,$data);

        try {
            $this->em->flush();
        } catch(\Exception $e) {
            die(var_dump($e->getMessage()));
        }
        return $this->extract($this->entity);
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
                'dataLancamento' => $dataLancamento->format('d/m/Y'),
                'usuario' => $receita->getUser()->getNome(),
                'totalReceita' => $total,
                'banco' => $receita->getConta()->getBanco()->getNome(),
                'categoria' => $receita->getCategoria()->getCategoria()

            );
        }
        return $data;

    }

}