<?php
namespace cff\V1\Rest\Familiares;

class FamiliaresResourceFactory
{
    public function __invoke($services)
    {
        return new FamiliaresResource();
    }
}
