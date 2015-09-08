<?php
namespace cff\V1\Rest\Banco;

class BancosResourceFactory
{
    public function __invoke($services)
    {
        return new BancosResource();
    }
}
