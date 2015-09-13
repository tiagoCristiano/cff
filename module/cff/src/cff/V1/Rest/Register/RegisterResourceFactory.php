<?php
namespace cff\V1\Rest\Register;

class RegisterResourceFactory
{
    public function __invoke($services)
    {
        return new RegisterResource();
    }
}
