<?php
namespace cff;

use cff\V1\Rest\Auth\AuthEntity;

use cff\V1\Rest\Contas\ContasEntity;
use cff\V1\Rest\Contas\ContasMapper;
use ZF\Apigility\Provider\ApigilityProviderInterface;
use cff\V1\Rest\Auth\AuthMapper;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Crypt\Password\Bcrypt;
use Zend\Stdlib\Hydrator;

use cff\V1\Rest\Familia\FamiliaService;
use cff\V1\Rest\Banco\BancoService;
use cff\Entity\Banco\Banco as BancoEntity;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(

                'bcrypt'=> function() {
                    return new  Bcrypt(array('salt' => '1234597890123450','cost' => 4));
                },

                'AuthTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Mysql');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new AuthEntity());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },

                'cff\V1\Rest\Auth\AuthMapper' => function($sm) {
                    $tableGateway = $sm->get('AuthTableGateway');
                    $bcrypt = $sm->get('bcrypt');
                    return new AuthMapper($tableGateway, $bcrypt);
                },


                'ContasTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('mySql');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ContasEntity());
                    return new TableGateway('contas', $dbAdapter, null, $resultSetPrototype);
                },
                'cff\V1\Rest\Auth\ContasMapper' => function($sm) {
                    $tableGateway = $sm->get('ContasTableGateway');
                    return new ContasMapper($tableGateway);
                },

                'BancosTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('mySql');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new BancosEntity());
                    return new TableGateway('bancos', $dbAdapter, null, $resultSetPrototype);
                },

                'cff\V1\Rest\Auth\BancoMapper' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    return new BancoMapper($em);
                },

                'FamiliasTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('mySql');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new FamiliasEntity());
                    return new TableGateway('familias', $dbAdapter, null, $resultSetPrototype);
                },

                'cff\V1\Rest\Auth\FamiliaMapper' => function($sm) {
                    $tableGateway = $sm->get('FamiliasTableGateway');
                    return new FamiliaMapper($tableGateway);
                },
                'FamiliaService' =>function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $hydrator = new Hydrator\ClassMethods();
                    $familiaService = new FamiliaService($em,$hydrator);
                    return $familiaService;
                },

                 'BancoService' =>function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $hydrator = new Hydrator\ClassMethods();
                    $bancoEntity = new BancoEntity();
                    $bancoService = new BancoService($em,$hydrator,$bancoEntity);
                    return $bancoService;
                }




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
                            'condition' => 'and', // optional, default is 'or'
                            'filter'    => 'custom.hydrator.filter.key.in.servicemanager',
                        ),
                    ),
                ),
            ),
        );

    }
}
