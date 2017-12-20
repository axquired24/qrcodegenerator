<?php

// To run this file, use php cli, From Project Root Run :
// php databases/migrations/create_member_tables.php

require "bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$schematable  = "members";

// Drop Table
Capsule::schema()->drop($schematable);

Capsule::schema()->create($schematable, function ($table) {

    $table->increments('id');

    $table->string('name');

    $table->string('email')->nullable();

    // qrtoken =
    $table->string('qrtoken')->nullable()->comment('QR Code String');

    $table->timestamps();

});

echo "table $schematable created.\n";