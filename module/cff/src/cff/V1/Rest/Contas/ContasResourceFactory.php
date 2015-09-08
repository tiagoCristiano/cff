<?php
namespace cff\V1\Rest\Contas;

class ContasResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get(' cff\V1\Rest\Auth\ContasMapper');
        return new ContasResource($mapper);
    }
}
