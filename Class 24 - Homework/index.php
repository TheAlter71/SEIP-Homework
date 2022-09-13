<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <style>
    /* Manual Styling */
    table {
        caption-side: bottom;
        border-collapse: unset;
    }

    .message {
        display: flex;
        justify-content: right;
    }

    .mark-danger:hover {
        color: red;
    }
    </style>
</head>



<body>

    <?php

    session_start();

    include_once './task_handler/task-manager.php';

    // if (isset($_SESSION['info'])) {
    //     $all_car =  $_SESSION['info'];
    // }

    $taskObj = new TaskManager();
    $all_car = $taskObj->show();

    ?>


    <div class="container mt-5">

        <a href="form.php"><button type="button" class="btn btn-primary">ADD NEW CAR</button></a>

        <table class="table table-primary mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($all_car)) {
                    foreach ($all_car as $key => $car) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $car['brand'] ?? [] ?></td>
                    <td><?= $car['color'] ?? [] ?></td>
                    <td><?= $car['price'] ?? [] ?> BDT <a href="details.php?id=<?= $key ?>" class="mx-5">DETAILS</a> <a
                            href="form.php?id=<?= $key ?>">EDIT</a>
                        <a href="delete.php?id=<?= $key ?>" class="mx-5 mark-danger">DELETE</a>
                    </td>
                </tr>
                <?php }
                } ?>

            </tbody>
        </table>

        <a href="destroy.php"><button type="button" class="btn btn-danger mt-4">DELETE ALL</button></a>

        <!-- Toast -->

        <?php
        if (isset($_SESSION['toast'])) {
        ?>
        <div class="message mt-4">
            <div class="toast align-items-center fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $_SESSION['toast'] ?>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

        <?php
        }

        unset($_SESSION['toast']);
        ?>
        <!-- Toast -->

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>