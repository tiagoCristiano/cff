<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\\DBAL\\Driver\\PDOMySql\\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => '',
                    'dbname' => 'controlefinanceiro',
                ),
            ),
        ),
    ),
    'db' => array(
        'adapters' => array(
            'Mysql' => array(
                'database' => 'controlefinanceiro',
                'driver' => 'PDO_Mysql',
                'username' => 'root',
            ),
        ),
    ),
);
