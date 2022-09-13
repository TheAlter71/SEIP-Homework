<?php

include_once './task_handler/task-manager.php';

// Objects
$obj_TaskManager = new TaskManager;


// Validate some conditions
$type = $_FILES['image']['type'];

if ($type == 'image/png' or $type == 'image/jpeg' or $type == 'image/gif') {

    $dir = './images/';
    $imgName = $_FILES['image']['name'];
    $rename = date('Ymd') . time() . '.jpg';

    $upload = $dir . $rename;
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);

    $obj_TaskManager->uploadImage($_POST['id'], $rename);

    header('Location: ./index.php');
} else {
    die('WARNING: Not a valid image format');
}