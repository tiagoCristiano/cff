<?php
namespace cff\V1\Rest\Banco;

class BancoResourceFactory
{
    public function __invoke($services)
    {
        return new BancoResource();
    }
}
