<?php

use Illuminate\Database\Capsule\Manager as Capusle;

$capsule = new Capusle();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      =>  DB_HOST,
    'database'  =>  DB_NAME,
    'username'  =>  DB_USERNAME,
    'password'  =>  DB_PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();