<?php
require_once('../../../../config/db_connect.php');
$query = 'SELECT region from wec353_4.Region group by region';
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

<h1>List of Regions</h1>

<div class="add-btn">
    <button>
        <a href="./create.php">Add a new region</a>
    </button>
</div>

<div class="data-table">
    <table>
        <thead>
        <tr>
            <td>Name</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['region'] ?></td>
                <td>
                    <a href="./edit.php?region=<?= $row['region'] ?>">Edit</a>
                    <a href="./delete.php?region=<?= $row['region'] ?>">Delete</a><!--
                    <a href="./display.php?region=<?/*= $row['region'] */?>">Details</a>-->
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
