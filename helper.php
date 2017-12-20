<?php

function hl_getIfIsset($param, $type = 'get')
{
    if ($type == 'post') {
        $data = isset($_POST[$param]) ? $_POST[$param] : null;
    }
    else {
        $data = isset($_GET[$param]) ? $_GET[$param] : null;
    }
}