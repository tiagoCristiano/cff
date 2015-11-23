<?php
namespace cff\V1\Rest\Relatorios;

class RelatoriosResourceFactory
{
    public function __invoke($services)
    {
        return new RelatoriosResource($services->get('RelatorioService'));
    }
}
