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
                'password' => '',
            ),
        ),
    ),
    'email' => array(
        'host' => 'mailtrap.io',
        'auth'     => 'CRAM-MD5',
        'username' => '4616228992c081f83',
        'password' => 'a5dc5ff380e616',
        'port' => '2525',
        'ssl' =>'tls'
    ),
);
