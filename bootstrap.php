<?php

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

date_default_timezone_set("Asia/Jakarta");

// CHANGE THIS WITH YOUR ENVIRONTMENT - Static Variable

// dev / production
$environtment = 'production';

$server_protocol = 'http';

$base_url = $_SERVER['SERVER_NAME'].'/mdpmanager';
// END static variable

define('SERVER_PROTOCOL', $server_protocol);
define('BASE_URL', $base_url);

if ($environtment != 'dev') {
    error_reporting(0);
}


// Boot Eloquent Connection
$capsule = new Capsule;

$capsule->addConnection([
    "driver"    => "mysql",
    "host"      =>"localhost",
    "database"  => "mdpmanager",
    "username"  => "root",
    "password"  => "root"
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();