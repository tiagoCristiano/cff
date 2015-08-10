<?php
namespace cff\V1\Rest\Auth;

class AuthResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('cff\V1\Rest\Auth\AuthMapper');

        return new AuthResource($mapper);
    }
}
