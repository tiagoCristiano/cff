<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'cff\\V1\\Rest\\Auth\\AuthResource' => 'cff\\V1\\Rest\\Auth\\AuthResourceFactory',
            'cff\\V1\\Rest\\Contas\\ContasResource' => 'cff\\V1\\Rest\\Contas\\ContasResourceFactory',
            'cff\\V1\\Rest\\Familia\\FamiliaResource' => 'cff\\V1\\Rest\\Familia\\FamiliaResourceFactory',
            'cff\\V1\\Rest\\Banco\\BancoResource' => 'cff\\V1\\Rest\\Banco\\BancoResourceFactory',
            'cff\\V1\\Rest\\Register\\RegisterResource' => 'cff\\V1\\Rest\\Register\\RegisterResourceFactory',
            'cff\\V1\\Rest\\Familiares\\FamiliaresResource' => 'cff\\V1\\Rest\\Familiares\\FamiliaresResourceFactory',
            'cff\\V1\\Rest\\User\\UserResource' => 'cff\\V1\\Rest\\User\\UserResourceFactory',
            'cff\\V1\\Rest\\Categorias\\CategoriasResource' => 'cff\\V1\\Rest\\Categorias\\CategoriasResourceFactory',
            'cff\\V1\\Rest\\Despesas\\DespesasResource' => 'cff\\V1\\Rest\\Despesas\\DespesasResourceFactory',
            'cff\\V1\\Rest\\Receitas\\ReceitasResource' => 'cff\\V1\\Rest\\Receitas\\ReceitasResourceFactory',
            'cff\\V1\\Rest\\Orcamentos\\OrcamentosResource' => 'cff\\V1\\Rest\\Orcamentos\\OrcamentosResourceFactory',
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
            'cff.rest.register' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/register[/:register_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Register\\Controller',
                    ),
                ),
            ),
            'cff.rest.familiares' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/familiares[/:familiares_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Familiares\\Controller',
                    ),
                ),
            ),
            'cff.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\User\\Controller',
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
            'cff.rest.despesas' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/despesas[/:despesas_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Despesas\\Controller',
                    ),
                ),
            ),
            'cff.rest.receitas' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/receitas[/:receitas_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Receitas\\Controller',
                    ),
                ),
            ),
            'cff.rest.orcamentos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/orcamentos[/:orcamentos_id]',
                    'defaults' => array(
                        'controller' => 'cff\\V1\\Rest\\Orcamentos\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'cff.rest.auth',
            4 => 'cff.rest.contas',
            8 => 'cff.rest.familia',
            9 => 'cff.rest.banco',
            10 => 'cff.rest.register',
            11 => 'cff.rest.familiares',
            12 => 'cff.rest.user',
            13 => 'cff.rest.categorias',
            14 => 'cff.rest.despesas',
            15 => 'cff.rest.receitas',
            16 => 'cff.rest.orcamentos',
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
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Contas\\ContasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Contas\\ContasCollection',
            'service_name' => 'contas',
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
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
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
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Banco\\BancoEntity',
            'collection_class' => 'cff\\V1\\Rest\\Banco\\BancoCollection',
            'service_name' => 'banco',
        ),
        'cff\\V1\\Rest\\Register\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Register\\RegisterResource',
            'route_name' => 'cff.rest.register',
            'route_identifier_name' => 'register_id',
            'collection_name' => 'register',
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
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Register\\RegisterEntity',
            'collection_class' => 'cff\\V1\\Rest\\Register\\RegisterCollection',
            'service_name' => 'register',
        ),
        'cff\\V1\\Rest\\Familiares\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Familiares\\FamiliaresResource',
            'route_name' => 'cff.rest.familiares',
            'route_identifier_name' => 'familiares_id',
            'collection_name' => 'familiares',
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
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Familiares\\FamiliaresEntity',
            'collection_class' => 'cff\\V1\\Rest\\Familiares\\FamiliaresCollection',
            'service_name' => 'familiares',
        ),
        'cff\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\User\\UserResource',
            'route_name' => 'cff.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
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
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'cff\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'user',
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
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Categorias\\CategoriasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Categorias\\CategoriasCollection',
            'service_name' => 'categorias',
        ),
        'cff\\V1\\Rest\\Despesas\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Despesas\\DespesasResource',
            'route_name' => 'cff.rest.despesas',
            'route_identifier_name' => 'despesas_id',
            'collection_name' => 'despesas',
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
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Despesas\\DespesasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Despesas\\DespesasCollection',
            'service_name' => 'despesas',
        ),
        'cff\\V1\\Rest\\Receitas\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Receitas\\ReceitasResource',
            'route_name' => 'cff.rest.receitas',
            'route_identifier_name' => 'receitas_id',
            'collection_name' => 'receitas',
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
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Receitas\\ReceitasEntity',
            'collection_class' => 'cff\\V1\\Rest\\Receitas\\ReceitasCollection',
            'service_name' => 'receitas',
        ),
        'cff\\V1\\Rest\\Orcamentos\\Controller' => array(
            'listener' => 'cff\\V1\\Rest\\Orcamentos\\OrcamentosResource',
            'route_name' => 'cff.rest.orcamentos',
            'route_identifier_name' => 'orcamentos_id',
            'collection_name' => 'orcamentos',
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
            'collection_query_whitelist' => array(
                0 => 'familia_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'cff\\V1\\Rest\\Orcamentos\\OrcamentosEntity',
            'collection_class' => 'cff\\V1\\Rest\\Orcamentos\\OrcamentosCollection',
            'service_name' => 'orcamentos',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'cff\\V1\\Rest\\Auth\\Controller' => 'Json',
            'cff\\V1\\Rest\\Contas\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Familia\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Banco\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Register\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Familiares\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\User\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Categorias\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Despesas\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Receitas\\Controller' => 'HalJson',
            'cff\\V1\\Rest\\Orcamentos\\Controller' => 'HalJson',
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
            'cff\\V1\\Rest\\Register\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familiares\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Categorias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Despesas\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Receitas\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'cff\\V1\\Rest\\Orcamentos\\Controller' => array(
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
            'cff\\V1\\Rest\\Familia\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Banco\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Register\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Familiares\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Categorias\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Despesas\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Receitas\\Controller' => array(
                0 => 'application/vnd.cff.v1+json',
                1 => 'application/json',
            ),
            'cff\\V1\\Rest\\Orcamentos\\Controller' => array(
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
            'cff\\V1\\Rest\\Register\\RegisterEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.register',
                'route_identifier_name' => 'register_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Register\\RegisterCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.register',
                'route_identifier_name' => 'register_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Familiares\\FamiliaresEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.familiares',
                'route_identifier_name' => 'familiares_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Familiares\\FamiliaresCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.familiares',
                'route_identifier_name' => 'familiares_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.user',
                'route_identifier_name' => 'user_id',
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
            'cff\\V1\\Rest\\Despesas\\DespesasEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.despesas',
                'route_identifier_name' => 'despesas_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Despesas\\DespesasCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.despesas',
                'route_identifier_name' => 'despesas_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Receitas\\ReceitasEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.receitas',
                'route_identifier_name' => 'receitas_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Receitas\\ReceitasCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.receitas',
                'route_identifier_name' => 'receitas_id',
                'is_collection' => true,
            ),
            'cff\\V1\\Rest\\Orcamentos\\OrcamentosEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.orcamentos',
                'route_identifier_name' => 'orcamentos_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'cff\\V1\\Rest\\Orcamentos\\OrcamentosCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'cff.rest.orcamentos',
                'route_identifier_name' => 'orcamentos_id',
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
        'cff\\V1\\Rest\\Familia\\Controller' => array(
            'input_filter' => 'cff\\V1\\Rest\\Familia\\Validator',
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
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'agencia',
                'error_message' => 'Informe a agencia;',
            ),
        ),
        'cff\\V1\\Rest\\Familia\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'nome',
                'description' => 'Nome da Família.',
                'error_message' => 'Informe o nome da Família',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'qtdMembros',
                'description' => 'Quantidade de membros da família.',
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
    'doctrine' => array(
        'driver' => array(
            'cff_driver' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    0 => 'C:\\Users\\tiago.alves\\Desktop\\TCC\\cff\\module\\cff\\config/../src/cff/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'cff\\Entity' => 'cff_driver',
                ),
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'cff\\V1\\Rest\\Register\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
