<?php
namespace cff\V1\Rest\Register;

class RegisterResourceFactory
{
    public function __invoke($services)
    {
        $registerService = $services->get('RegisterService');
        return new RegisterResource($registerService);
    }
}
