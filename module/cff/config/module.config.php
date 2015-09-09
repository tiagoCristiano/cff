<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'cff\\V1\\Rest\\Auth\\AuthResource' => 'cff\\V1\\Rest\\Auth\\AuthResourceFactory',
            'cff\\V1\\Rest\\Contas\\ContasResource' => 'cff\\V1\\Rest\\Contas\\ContasResourceFactory',
            'cff\\V1\\Rest\\Familias\\FamiliasResource' => 'cff\\V1\\Rest\\Familias\\FamiliasResourceFactory',
            'cff\\V1\\Rest\\Familia\\FamiliaResource' => 'cff\\V1\\Rest\\Familia\\FamiliaResourceFactory',
            'cff\\V1\\Rest\\Banco\\BancoResource' => 'cff\\V1\\Rest\\Banco\\BancoResourceFactory',
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
            'cff.rest.contas' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/contas[/:contas_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Contas\\Controller',
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
            'cff.rest.familia' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/familia[/:familia_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Familia\\Controller',
                    ),
                ),
            ),
            'cff.rest.banco' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/banco[/:banco_id][/:familia_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Banco\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'cff.rest.auth',
            4 => 'cff.rest.contas',
            6 => 'cff.rest.familias',
            8 => 'cff.rest.familia',
            9 => 'cff.rest.banco',
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
        'cff\\V1\\Rest\\Familia\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Familia\\FamiliaResource',
            'route_name' => 'cff.rest.familia',
            'route_identifier_name' => 'familia_id',
            'collection_name' => 'familia',
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
            'entity_class' => 'cff\\V1\\Rest\\Familia\\FamiliaEntity',
            'collection_class' => 'cff\\V1\\Rest\\Familia\\FamiliaCollection',
            'service_name' => 'familia',
        ),
        'cff\\V1\\Rest\\Banco\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Banco\\BancoResource',
            'route_name' => 'cff.rest.banco',
            'route_identifier_name' => 'banco_id',
            'collection_name' => 'banco',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                   'familia_id'
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Banco\\BancoEntity',
            'collection_class' => 'cff\\V1\\Rest\\Banco\\BancoCollection',
            'service_name' => 'banco',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => 'Json',
            'cff\\V1\\Rest\\Contas\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Familias\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Familia\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Banco\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Contas\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familia\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Banco\\Controller' => array(
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
            'cff\\V1\\Rest\\Contas\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familia\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Banco\\Controller' => array(
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
            'cff\\V1\\Rest\\Familia\\FamiliaEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.familia',
                'route_identifier_name' => 'familia_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Familia\\FamiliaCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.familia',
                'route_identifier_name' => 'familia_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Banco\\BancoEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.banco',
                'route_identifier_name' => 'banco_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Banco\\BancoCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.banco',
                'route_identifier_name' => 'banco_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'cff\\V1\\Rest\\Auth\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Auth\\Validator',
        ),
        'cff\\V1\\Rest\\Banco\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Banco\\Validator',
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
        'cff\\V1\\Rest\\Banco\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
                'description' => 'Nome do banco a ser criado',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\ToInt',
                        'options' => array(),
                    ),
                ),
                'name' => 'status',
                'description' => 'Status do registro.',
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(),
        'doctrine-connected' => array(
            'Api\\V1\\Rest\\Familia' => array(
                'query_providers' => array(
                    'default' => 'default_orm',
                    'fetch_all' => 'entity_name_fetch_all',
                ),
            ),
        ),
    ),
    'doctrine-hydrator' => array(
        'hydrator-manager-key' => array(
            'entity_class' => 'C:\\Users\\Tiago\\Desktop\\api\\apigility\\module\\cff\\config/../src/cff/Entity',
            'object_manager' => 'doctrine.objectmanager.key.in.servicelocator',
            'by_value' => true,
            'use_generated_hydrator' => true,
            'naming_strategy' => 'custom.naming.strategy.key.in.servicemanager',
            'hydrator' => 'custom.hydrator.key.in.hydratormanager',
            'strategies' => array(
                'fieldname' => 'custom.strategy.key.in.servicemanager',
            ),
            'filters' => array(
                'custom_filter_name' => array(
                    'condition' => 'and',
                    'filter' => 'custom.hydrator.filter.key.in.servicemanager',
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'cff_driver' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    0 => 'C:\\Users\\Tiago\\Desktop\\api\\apigility\\module\\cff\\config/../src/cff/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'cff\\Entity' => 'cff_driver',
                ),
            ),
        ),
    ),
);
