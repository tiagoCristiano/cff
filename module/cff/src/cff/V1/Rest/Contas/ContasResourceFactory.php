<?php
namespace cff\V1\Rest\Contas;

class ContasResourceFactory
{
    public function __invoke($services)
    {
        $contaSercice = $services->get('ContaService');
        return new ContasResource($contaSercice);
    }
}
