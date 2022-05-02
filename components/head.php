<?php require('menu.php');
require 'conf.php';
require 'functions.php';
require dirname(__FILE__, 2) . '/backend/backend.php';

if (array_key_exists('mode', $_GET)) {
    $curr_mode = intval($_GET['mode']);
}


require 'html_components/head.php';


