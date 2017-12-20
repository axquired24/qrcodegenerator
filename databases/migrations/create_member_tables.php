<?php

// To run this file, use php cli, From Project Root Run :
// php databases/migrations/create_member_tables.php

require "bootstrap.php";
require "helper.php";

use Illuminate\Database\Capsule\Manager as Capsule;
//use Member;

$schematable  = "members";

// Drop Table
Capsule::schema()->drop($schematable);

// Create Table
Capsule::schema()->create($schematable, function ($table) {

    $table->increments('id');

    $table->string('name');

    $table->string('email')->nullable();

    // qrtoken =
    $table->string('qrtoken')->nullable()->comment('QR Code String');

    $table->timestamps();

});
echo "table $schematable created.\n";

// Seed Table
$names = ['Albert Septiawan', 'Bashid Heri', 'Purnomo', 'Wahyu Sanutra', 'Galih Nurifat', 'Adon Ladamo'];
foreach ($names as $n) {
    $member = new Member();
    $member->name = $n;
    $member->email = hl_slugify($n) . '@mdp.mobilan.id';
    $member->qrtoken = hl_tokenGenerate($n);
    $member->save();
}

echo "table $schematable seeded.\n";