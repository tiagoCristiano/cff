<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'cff\\V1\\Rest\\Auth\\AuthResource' => 'cff\\V1\\Rest\\Auth\\AuthResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'cff.rest.auth' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/auth[/:auth_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Auth\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'cff.rest.auth',
        ),
    ),
    'zf-rest' => array(
        'cff\\V1\\Rest\\Auth\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Auth\\AuthResource',
            'route_name' => 'cff.rest.auth',
            'route_identifier_name' => 'auth_id',
            'collection_name' => 'auth',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'POST',
                1 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Auth\\AuthEntity',
            'collection_class' => 'cff\\V1\\Rest\\Auth\\AuthCollection',
            'service_name' => 'auth',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'cff\\V1\\Rest\\Auth\\AuthEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.auth',
                'route_identifier_name' => 'auth_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Auth\\AuthCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.auth',
                'route_identifier_name' => 'auth_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'cff\\V1\\Rest\\Auth\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Auth\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'cff\\V1\\Rest\\Auth\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\EmailAddress',
                        'options' => array(),
                    ),
                ),
                'filters' => array(),
                'name' => 'email',
                'description' => 'Email do usuário.',
                'error_message' => 'Informe o email.',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'password',
                'description' => 'Senha do Usuário.',
                'error_message' => 'Informe a senha do usuário.',
            ),
        ),
    ),
);
