<?php

require "bootstrap.php";
use EasySlugger\Slugger;

function hl_getIfIsset($param, $type = 'get')
{
    if ($type == 'post') {
        $data = isset($_POST[$param]) ? $_POST[$param] : null;
    }
    else {
        $data = isset($_GET[$param]) ? $_GET[$param] : null;
    }
    return $data;
}

function hl_dateFormat($date, $format="d F Y, H:i")
{
    $date = date_create($date, time());
    $datef = date_format($date, $format);
    return $datef;
}

function hl_dateNow($format='Y-m-d H:i:s') {
    return date($format, time());
}

function hl_tokenGenerate($param='') {
    $data = hl_slugify($param) . hl_dateNow() . mt_rand(0,999);
    $data = md5($data);
    return $data;
}

function hl_slugify($param)
{
    $slugname = Slugger::slugify($param);
    return $slugname;
}