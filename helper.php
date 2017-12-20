<?php

require "bootstrap.php";
use EasySlugger\Slugger;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;

function hl_url($path='')
{
    // FIXME ubah file ini untuk konfigurasi
    $protocol = SERVER_PROTOCOL;
    $base_url = BASE_URL;
    $data = $protocol.'://'.$base_url.'/'.$path;
    return $data;
}

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
    $date = date_create($date);
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

function hl_generateQR($param, $size=300)
{
    $filename = 'assets/qrcodes/'.$param.'.png';
    $filefolder = __DIR__.'/'.$filename;
    if (!file_exists($filefolder)) {
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight($size);
        $renderer->setWidth($size);
        $renderer->setMargin(1);
        $writer = new \BaconQrCode\Writer($renderer);
        $writer->writeFile($param, $filefolder);
    }
    return hl_url($filename);
}

// FIXME link untuk paginate
//function hl_paginateLinks(Paginator $paginator)
//{
//    return "total ". $paginator->total();
//}