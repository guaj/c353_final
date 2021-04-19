<?php
require_once('../../../../config/db_connect.php');
$query = 'SELECT * from wec353_4.publichealthworker';
$result = $conn->query($query);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>COVID APP</title>
</head>
<body>

<h1>List of Public Health workers</h1>

<div class="add-btn">
    <button>
        <a href="./create.php">Add a new worker</a>
    </button>
</div>

<div class="data-table">
    <table>
        <thead>
        <tr>
            <td>Medicare number</td>
            <td>License</td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['worker_medicare_no'] ?></td>
                <td><?= $row['license'] ?></td>
                <td>
                    <a href="./edit.php?license=<?= $row['license'] ?>">Edit</a>
                    <a href="./delete.php?worker_medicare_no=<?= $row['worker_medicare_no'] ?>">Delete</a>
                    <!-- <a href="./display.php?region=<?/*= $row['region'] */?>">Details</a>-->
                </td>
            </tr>
        <?php  }?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>

