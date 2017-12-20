<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MDP Member Manager</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 60px;
        }
    </style>
</head>
<body>
<?php
    // bootstrap require in helper.php
    require "helper.php";
    $content = hl_getIfIsset('content');
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4><i class="glyphicon glyphicon-qrcode"></i> Member Manager</h4>
        </div>
        <div align="right" class="col-md-4">
            <a href="<?php echo hl_url(); ?>" class="btn btn-default">Daftar Member</a>
            <a href="<?php echo hl_url('?content=add'); ?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Baru</a>
        </div>
    </div>
    <hr>
    <?php
        if($content != null) {
            include "views/".$content.".php";
        } else {
            include "views/member_list.php";
        }
    ?>
</div>

<script src="assets/jquery/jquery-2.2.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>