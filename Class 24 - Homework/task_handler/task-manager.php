<?php

//use PDO;

class TaskManager
{

    public function create($info)
    {
        session_start();

        $db = new PDO('mysql:host=localhost;dbname=car', 'root', '123');

        if (isset($info['id'])) {
            $key = $info['id'];
            $_SESSION['info'][$key]['brand'] = $info['brand'];
            $_SESSION['info'][$key]['color'] = $info['color'];
            $_SESSION['info'][$key]['price'] = $info['price'];

            // Toast value
            $_SESSION['toast'] = "Car updated successfully!";
        } else {

            $statement = $db->prepare("INSERT INTO car_infos(brand, color, price) VALUES(:brand, :color, :price)");
            $statement->execute(
                [
                    'brand' => $info['brand'],
                    'color' => $info['color'],
                    'price' => $info['price']
                ]
            );

            // Toast Value
            $_SESSION['toast'] = "Car added successfully!";
        }

        return;
    }

    public function show()
    {
        $db = new PDO('mysql:host=localhost;dbname=car', 'root', '123');
        $statement = $db->query('SELECT * FROM car_infos');
        $info = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $info;
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