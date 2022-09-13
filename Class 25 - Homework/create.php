<?php

include_once './task_handler/task-manager.php';

session_start();

// Objects
$obj_TaskManager = new TaskManager;

// Validation System


// Brand name validation
if (empty($_POST['brand'])) {
    $_SESSION['alert_brand'] = "Brand name cannot be empty!";
    header('Location: ./form.php');
} else if (preg_match('/[^a-zA-Z]/', $_POST['brand'])) {
    $_SESSION['alert_brand'] = "Brand name must contains letters only!";
    header('Location: ./form.php');
}

// color name validation
if (empty($_POST['color'])) {
    $_SESSION['alert_color'] = "Color cannot be empty!";
    header('Location: ./form.php');
} else if (preg_match('/[^a-zA-Z]/', $_POST['color'])) {
    $_SESSION['alert_color'] = "Color must contains letters only!";
    header('Location: ./form.php');
}

// price validation
if (empty($_POST['price'])) {
    $_SESSION['alert_price'] = "Price cannot be empty!";
    header('Location: ./form.php');
} else if (preg_match('/[^0-9]/', $_POST['price'])) {
    $_SESSION['alert_price'] = "Color must contains number only!";
    header('Location: ./form.php');
} else {
    //Actions
    $obj_TaskManager->create($_POST);
    header('Location: ./index.php');
}