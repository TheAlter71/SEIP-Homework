<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "All data successfully destroyed";
    session_start();
    session_destroy();
    die();
}

include_once './vendor/autoload.php';

use Project\stuff;

$new_stuff = new stuff();
$new_stuff->store($_POST);

header('Location: ./index.php');