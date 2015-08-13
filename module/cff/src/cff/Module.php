<?php
namespace cff;

use cff\V1\Rest\Auth\AuthEntity;
use ZF\Apigility\Provider\ApigilityProviderInterface;
use cff\V1\Rest\Auth\AuthMapper;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Crypt\Password\Bcrypt;

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
                'AuthTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('mySql');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new AuthEntity());
                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                },
                'bcrypt'=> function() {
                    return new  Bcrypt(array('salt' => '1234567890123450','cost' => 4));
                },
                'cff\V1\Rest\Auth\AuthMapper' => function($sm) {
                    $tableGateway = $sm->get('AuthTableGateway');
                    $bcrypt = $sm->get('bcrypt');
                    return new AuthMapper($tableGateway, $bcrypt);
                }

            )
        );

    }
}
