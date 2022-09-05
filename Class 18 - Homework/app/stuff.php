<?php

namespace Project;

class stuff
{
    public $name;
    public $salary;

    public function store($data)
    {
        session_start();
        $_SESSION['stuff'][] = $data;
    }
}