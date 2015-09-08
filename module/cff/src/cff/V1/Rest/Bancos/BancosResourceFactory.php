<?php
namespace cff\V1\Rest\Bancos;

class BancosResourceFactory
{
    public function __invoke($services)
    {
        return new BancosResource();
    }
}
