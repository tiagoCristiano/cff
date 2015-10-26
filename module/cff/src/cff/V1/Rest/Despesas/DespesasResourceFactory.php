<?php
namespace cff\V1\Rest\Despesas;

class DespesasResourceFactory
{
    public function __invoke($services)
    {
        return new DespesasResource($services->get('DespesaService'));
    }
}
