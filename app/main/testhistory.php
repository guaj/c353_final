<?php require_once("../../config/db_connect.php");
$sql = "SELECT * from wec353_4.diagnosis WHERE medicare_no = '".$_GET["medicare_no"]."';";
$result = $conn->query($sql);
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

<div id="tab1" class="tab-content">

    <h1>Your test  History</h1>

    <div>
        <table>
            <thead>
            <tr>
                <td>Date of test</td>
                <td>Date of result</td>
                <td>Result</td>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row['date_of_test'] ?></td>
                    <td><?= $row['date_of_result'] ?></td>
                    <td><?= $row['diagnosis_result'] ?></td>
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
