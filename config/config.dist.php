<?php
use Phalcon\Config;

$config = new Config([
    /* uncomment to use mysql
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'dbname',
        'charset'     => 'utf8',
    ],
    */
    'database' => [
        'dbname' => APP_PATH . '/cache/demo.db'
    ],
    'application' => [
        'viewsDir'       => APP_PATH . '/views/',
        'cacheDir'       => APP_PATH . '/cache/',
        'logsDir'        => APP_PATH . '/logs/',
        'baseDir'        => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/src/Controllers',
        'tasksDir'       => APP_PATH . '/src/Tasks',
        'baseUri'        => '',
        'staticBaseUri'  => '/',
    ],
    'eventListeners' => [
        'db' => [
            'PhalconX\Db\DbListener' => ['logging' => true]
        ]
    ],
    'annotations' => [
        'prefix' => 'v1',
        'lifetime' => 10,
    ],
    'metadata' => [
        'prefix' => 'v1',
        'lifetime' => 10,
    ],
]);

if (PHP_SAPI != 'cli') {
    $config->merge(new Config([
        'eventListeners' => [
            'dispatch' => [
                'PhalconX\Mvc\Controller\Filters',
                'AdminGen\Mvc\ExceptionHandler'
            ],
        ]
    ]));
}

return $config;
