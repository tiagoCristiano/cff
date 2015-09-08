<?php
namespace cff\V1\Rest\Familia;

class FamiliaResourceFactory
{
    public function __invoke($services)
    {
        $familiaService = $services->get('FamiliaService');
        return new FamiliaResource($familiaService);
    }
}
