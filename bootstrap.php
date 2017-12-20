<?php

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    "driver" => "mysql",
    "host" =>"localhost",
    "database" => "mdpmanager",
    "username" => "root",
    "password" => "root"
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();