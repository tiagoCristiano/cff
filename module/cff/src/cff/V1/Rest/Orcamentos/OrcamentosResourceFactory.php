<?php
namespace cff\V1\Rest\Orcamentos;

class OrcamentosResourceFactory
{
    public function __invoke($services)
    {
        return new OrcamentosResource($services->get('OrcamentoService'));
    }
}
