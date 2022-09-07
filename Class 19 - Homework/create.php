<?php

include_once './task_handler/task-manager.php';

// Objects
$obj_TaskManager = new TaskManager;


//Actions
$obj_TaskManager->create($_POST);


header('Location: ./index.php');