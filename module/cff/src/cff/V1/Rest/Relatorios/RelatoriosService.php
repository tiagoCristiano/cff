<?php
/**
 * Created by PhpStorm.
 * User: Tiago
 * Date: 22/11/2015
 * Time: 22:28
 */

namespace cff\V1\Rest\Relatorios;

use cff\V1\Rest\AbstractService\AbstractService;

class RelatoriosService extends AbstractService
{
    /**
     * @var \cff\V1\Rest\Contas\ContaService
     */
    protected $contaService;

    /**
     * @var \cff\V1\Rest\Despesas\DespesasService
     */
    protected $despesaService;
    /**
     * @var \cff\V1\Rest\Categorias\CategoriaService
     */
    protected $categoriaService;
    /**
     * @var \cff\V1\Rest\Receitas\ReceitasService
     */
    protected $recetiaService;
    /**
     * @var \cff\V1\Rest\User\UserService
     */
    protected $userSerive;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    /**
     * @var \Zend\Stdlib\Hydrator
     */
    protected  $hydrator;

    public function __construct(  $em, $hydrator, $contaService,  $despesaService, $categoriaService,$receitaService, $userService)
    {
        $this->em = $em;
        $this->hydrator = $hydrator;
        $this->contaService = $contaService;
        $this->despesaService = $despesaService;
        $this->categoriaService = $categoriaService;
        $this->recetiaService = $receitaService;
        $this->userSerive = $userService;
    }


    public function getRelatorios($params =  array())
    {
        $de   = $params->dataDe;
        $ate  = $params->dataAte;
        $tipo = $params->tipo;
        $familia = $params->familia_id;

        if($tipo = 'despsa'){
            $despesas =  $this->getDespesa($de, $ate, $familia);
            return $despesas;
        }

        if($tipo = 'receita') {
            return $this->getReceitas($de, $ate, $familia);
        }

    }

    public function getDespesa($de, $ate,$familia)
    {
        $dataRelatorios['categorias']  = $this->categoriaService->getCategoriasDespesas($de, $ate, $familia);
        $dataRelatorios['contas']      = $this->contaService->getContasDespesas($de, $ate, $familia);
        $dataRelatorios['usuarios']    = $this->userSerive->getUsuarioDespesas($de, $ate, $familia);
        return $dataRelatorios;

    }

    public function getReceitas($de, $ate)
    {

    }

}