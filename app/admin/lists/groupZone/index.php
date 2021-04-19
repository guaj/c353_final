<?php
require_once('../../../../config/db_connect.php');
$query = 'SELECT * from wec353_4.groupzone';
$result = $conn->query($query);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID APP</title>
</head>
<body>

<h1>List of Group Zones</h1>

<div class="add-btn">
    <button>
        <a href="./create.php">Add a new group zone</a>
    </button>
</div>

<div class="data-table">
    <table>
        <thead>
        <tr>
            <td>Name</td>
            <td>Group Type</td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['group_type'] ?></td>
                 <td>
                    <a href="./edit.php?name=<?= $row['name'] ?>">Edit</a>
                    <a href="./delete.php?group_type=<?= $row['group_type'] ?>">Delete</a><!--
                </td> -->
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
