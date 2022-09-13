<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <style>
    .main-div {
        margin: 60px 100px;
    }
    </style>
</head>

<body>

    <?php
    session_start();
    if (isset($_GET['id'])) {
        $the_key = $_GET['id'];

        include_once './task_handler/task-manager.php';
        $taskObj = new TaskManager();
        $car = $taskObj->show();

        $brand = $car[$the_key]['brand'];
        $color = $car[$the_key]['color'];
        $price = $car[$the_key]['price'];
        $image = $car[$the_key]['photo'];
    }
    ?>

    <div class="main-div">

        <a href="./index.php"><button type="submit" class="btn btn-success">Go To Home</button></a>
        <br>
        <br>
        <?php

        if ($image !== 'null') {



        ?>
        <div style="height: 200px; width: 300px;">
            <img style="height: 200px; width: 300px;" src="images/<?= $image ?>" alt="">

        </div>

        <?php
        }
        ?>


        <h3 class="mt-3">Car Brand : <?= $brand ?></h3>
        <h3 class="mt-3">Color : <?= $color ?></h3>
        <h3 class="mt-3">Price : <?= $price ?> BDT</h3>


        <br>
        <form action="image.php" method="POST" enctype="multipart/form-data">
            <input type="text" hidden name="id" value="<?= $_GET['db_id'] ?>">
            <input type="file" name="image">
            <br>
            <br>
            <button type="submit">SET</button>
        </form>

        <br>

        <a href="form.php?id=<?= $the_key ?>"><button type="reset" class="btn btn-primary">UPDATE</button></a>
        <a href="delete.php?id=<?= $the_key ?>"><button type="reset" class="btn btn-danger mx-3"> DELETE</button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>