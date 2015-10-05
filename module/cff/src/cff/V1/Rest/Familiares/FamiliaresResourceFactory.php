<?php
namespace cff\V1\Rest\Familiares;

class FamiliaresResourceFactory
{
    public function __invoke($services)
    {
        $familiaresService = $services->get('FamiliaresService');
        return new FamiliaresResource($familiaresService);
    }
}
