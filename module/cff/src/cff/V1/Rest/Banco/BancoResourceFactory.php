<?php
namespace cff\V1\Rest\Banco;

class BancoResourceFactory
{
    public function __invoke($services)
    {
        $bancoService = $services->get('BancoService');
        return new BancoResource($bancoService);
    }
}
