<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
        $key = $_GET['id'];

        $brand = $_SESSION['info'][$_GET['id']]['brand'];
        $color = $_SESSION['info'][$_GET['id']]['color'];
        $price = $_SESSION['info'][$_GET['id']]['price'];
        $button1 = "Update";
        $button2 = "Reset";
    }
    ?>

    <div class="main-div">

        <a href="./index.php"><button type="submit" class="btn btn-success">Go To Home</button></a>

        <form action='create.php' method="POST">

            <?php

            if (isset($_GET['id'])) {

            ?>
            <input hidden type="text" name="id" value="<?= $key ?>">
            <?php
            }

            ?>

            <br>
            <div class="mb-3">
                <label for="example  InputEmail1" class="form-label">Brand Name</label>
                <input name="brand" value='<?= $brand ?? '' ?>' type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

                <?php
                if (isset($_SESSION['alert_brand'])) {
                ?>

                <div id="emailHelp" class="form-text" style="color:red;"><?= $_SESSION['alert_brand'] ?></div>

                <?php
                    unset($_SESSION['alert_brand']);
                } else {
                ?>

                <div id="emailHelp" class="form-text">Enter the brand name of the car.</div>

                <?php
                }
                ?>


            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Color</label>
                <input name="color" value='<?= $color ?? '' ?>' type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <?php
                if (isset($_SESSION['alert_color'])) {
                ?>

                <div id="emailHelp" class="form-text" style="color:red;"><?= $_SESSION['alert_color'] ?></div>

                <?php
                    unset($_SESSION['alert_color']);
                } else {
                ?>

                <div id="emailHelp" class="form-text">Enter the color of the car.</div>

                <?php
                }
                ?>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Price (in BDT)</label>
                <input name="price" value='<?= $price ?? '' ?>' type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <?php
                if (isset($_SESSION['alert_price'])) {
                ?>

                <div id="emailHelp" class="form-text" style="color:red;"><?= $_SESSION['alert_price'] ?></div>

                <?php
                    unset($_SESSION['alert_price']);
                } else {
                ?>

                <div id="emailHelp" class="form-text">Enter the price in Bnagladeshi Taka.</div>

                <?php
                }
                ?>
            </div>

            <button type="submit" class="btn btn-primary"><?= $button1 ?? 'Submit' ?></button>
            <button type="reset" class="btn btn-danger mx-3"><?= $button2 ?? 'Discard' ?></button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>