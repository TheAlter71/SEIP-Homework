<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework</title>
</head>

<body>

    <br>
    <br>
    <br>

    <?php
    session_start();

    if (isset($_SESSION['stuff'])) {
        $all_stuff =  $_SESSION['stuff'];
    }
    ?>

    <div style="width:500px; margin: 0 auto;">
        <form action="./store.php" method="POST">
            <input name="Name" placeholder="Enter stuff name">
            <input name="Salary" placeholder="Enter Salary">
            <button>Save</button>
        </form>

        <br>

        <table border="1" style="width: 100%;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <?php
            if (isset($all_stuff)) {

            ?>
            <tbody>
                <?php
                    foreach ($all_stuff as $the_stuff) { ?>
                <tr>
                    <td> <?= $the_stuff['Name'] ?></td>
                    <td> <?= $the_stuff['Salary'] ?></td>
                </tr>
                <?php } ?>
            </tbody>

            <?php } ?>
        </table>

        <form action="./store.php" method="GET">
            <br>
            <button>Delete All</button>
        </form>
    </div>

</body>

</html>