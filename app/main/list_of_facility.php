<?php require_once("../../config/db_connect.php");
$sql2 = "select * from publichealthfacility;";
$result2 = $conn->query($sql2);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
<div id="tab3" class="tab-content">

    <h1>List of facility where you can get tested</h1>
    <div>
        <table>
            <thead>
            <tr>
                <td>Facility name</td>
                <td>Facility Address</td>
                <td>Contact</td>
                <td>Website</td>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result2->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td>
                        <a><?= $row['url'] ?></a>
                    </td>
                </tr>
            <?php  }?>
            </tbody>
        </table>
    </div>

    <footer>
        <a href="./index.php?medicare_no=<?=$_GET["medicare_no"]?>">Back </a>
    </footer>
</div>
</body>
</html>
