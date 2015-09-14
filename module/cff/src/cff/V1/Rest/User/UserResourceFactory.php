<?php
namespace cff\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {
        $userService = $services->get('UserService');
        return new UserResource($userService);
    }
}
