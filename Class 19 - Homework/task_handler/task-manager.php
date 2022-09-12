<?php
class TaskManager
{

    public function create($info)
    {
        session_start();

        if (isset($info['id'])) {
            $key = $info['id'];
            $_SESSION['info'][$key]['brand'] = $info['brand'];
            $_SESSION['info'][$key]['color'] = $info['color'];
            $_SESSION['info'][$key]['price'] = $info['price'];

            // Toast value
            $_SESSION['toast'] = "Car updated successfully!";
        } else {
            $_SESSION['info'][] = $info;

            // Toast Value
            $_SESSION['toast'] = "Car added successfully!";
        }



        return;
    }

    public function delete($id)
    {
        session_start();
        unset($_SESSION['info'][$id]);

        // Toast Value
        $_SESSION['toast'] = "Delete successfully!";
        return;
    }

    public function destroy()
    {
        session_start();
        session_destroy();

        session_start();
        // Toast Value
        $_SESSION['toast'] = "Everything destroyed successfully!";
        return;
    }
}