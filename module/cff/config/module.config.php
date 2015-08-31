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
            'cff.rest.familias' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/familias[/:familias_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Familias\\Controller',
                    ),
                ),
            ),
            'cff.rest.categorias' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/categorias[/:categorias_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Categorias\\Controller',
                    ),
                ),
            ),
            'cff.rest.bancos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/bancos[/:bancos_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Bancos\\Controller',
                    ),
                ),
            ),
            'cff.rest.contas' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/contas[/:contas_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Contas\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'cff.rest.auth',
            1 => 'cff.rest.familias',
            2 => 'cff.rest.categorias',
            3 => 'cff.rest.bancos',
            4 => 'cff.rest.contas',
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
        'cff\\V1\\Rest\\Familias\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Familias\\FamiliasResource',
            'route_name' => 'cff.rest.familias',
            'route_identifier_name' => 'familias_id',
            'collection_name' => 'familias',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Familias\\FamiliasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Familias\\FamiliasCollection',
            'service_name' => 'familias',
        ),
        'cff\\V1\\Rest\\Categorias\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Categorias\\CategoriasResource',
            'route_name' => 'cff.rest.categorias',
            'route_identifier_name' => 'categorias_id',
            'collection_name' => 'categorias',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Categorias\\CategoriasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Categorias\\CategoriasCollection',
            'service_name' => 'categorias',
        ),
        'cff\\V1\\Rest\\Bancos\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Bancos\\BancosResource',
            'route_name' => 'cff.rest.bancos',
            'route_identifier_name' => 'bancos_id',
            'collection_name' => 'bancos',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
                3 => 'PUT',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Bancos\\BancosEntity',
            'collection_class' => 'cff\\V1\\Rest\\Bancos\\BancosCollection',
            'service_name' => 'bancos',
        ),
        'cff\\V1\\Rest\\Contas\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Contas\\ContasResource',
            'route_name' => 'cff.rest.contas',
            'route_identifier_name' => 'contas_id',
            'collection_name' => 'contas',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Contas\\ContasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Contas\\ContasCollection',
            'service_name' => 'contas',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => 'Json',
            'cff\\V1\\Rest\\Familias\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Categorias\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Bancos\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Contas\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Categorias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Bancos\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Contas\\Controller' => array(
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
            'cff\\V1\\Rest\\Familias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Categorias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Bancos\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Contas\\Controller' => array(
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
            'cff\\V1\\Rest\\Familias\\FamiliasEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.familias',
                'route_identifier_name' => 'familias_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Familias\\FamiliasCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.familias',
                'route_identifier_name' => 'familias_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Categorias\\CategoriasEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.categorias',
                'route_identifier_name' => 'categorias_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Categorias\\CategoriasCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.categorias',
                'route_identifier_name' => 'categorias_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Bancos\\BancosEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.bancos',
                'route_identifier_name' => 'bancos_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Bancos\\BancosCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.bancos',
                'route_identifier_name' => 'bancos_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Contas\\ContasEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.contas',
                'route_identifier_name' => 'contas_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Contas\\ContasCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.contas',
                'route_identifier_name' => 'contas_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'cff\\V1\\Rest\\Auth\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Auth\\Validator',
        ),
        'cff\\V1\\Rest\\Familias\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Familias\\Validator',
        ),
        'cff\\V1\\Rest\\Categorias\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Categorias\\Validator',
        ),
        'cff\\V1\\Rest\\Bancos\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Bancos\\Validator',
        ),
        'cff\\V1\\Rest\\Contas\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Contas\\Validator',
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
        'cff\\V1\\Rest\\Familias\\Validator' => array(
            0 => array(
                'name' => 'nome',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'qtdMembros',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
        ),
        'cff\\V1\\Rest\\Categorias\\Validator' => array(
            0 => array(
                'name' => 'categoria',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '255',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'tipo',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
            2 => array(
                'name' => 'familias_Id',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => array(
                            'adapter' => 'mySql',
                            'table' => 'familias',
                            'field' => 'id',
                        ),
                    ),
                ),
            ),
        ),
        'cff\\V1\\Rest\\Bancos\\Validator' => array(
            0 => array(
                'name' => 'nome',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '50',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'agencia',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '10',
                        ),
                    ),
                ),
            ),
            2 => array(
                'name' => 'familias_id',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => array(
                            'adapter' => 'mySql',
                            'table' => 'familias',
                            'field' => 'id',
                        ),
                    ),
                ),
            ),
        ),
        'cff\\V1\\Rest\\Contas\\Validator' => array(
            0 => array(
                'name' => 'numero',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '10',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'agencia',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '10',
                        ),
                    ),
                ),
            ),
            2 => array(
                'name' => 'bancos_id',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\Digits',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => array(
                            'adapter' => 'mySql',
                            'table' => 'bancos',
                            'field' => 'id',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'cff\\V1\\Rest\\Familias\\FamiliasResource' => array(
                'adapter_name' => 'mySql',
                'table_name' => 'familias',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'cff\\V1\\Rest\\Familias\\Controller',
                'entity_identifier_name' => 'id',
            ),
            'cff\\V1\\Rest\\Categorias\\CategoriasResource' => array(
                'adapter_name' => 'mySql',
                'table_name' => 'categorias',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'cff\\V1\\Rest\\Categorias\\Controller',
                'entity_identifier_name' => 'id',
            ),
            'cff\\V1\\Rest\\Bancos\\BancosResource' => array(
                'adapter_name' => 'mySql',
                'table_name' => 'bancos',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'cff\\V1\\Rest\\Bancos\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'cff\\V1\\Rest\\Bancos\\BancosResource\\Table',
            ),
            'cff\\V1\\Rest\\Contas\\ContasResource' => array(
                'adapter_name' => 'mySql',
                'table_name' => 'contas',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'cff\\V1\\Rest\\Contas\\Controller',
                'entity_identifier_name' => 'id',
            ),
        ),
    ),
);
