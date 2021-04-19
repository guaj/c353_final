<?php
require_once('../../../../config/db_connect.php');
$query = 'SELECT * from wec353_4.guideline';
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

<h1>List of Recommendations</h1>

<div class="add-btn">
    <button>
        <a href="./create.php">Add a new recommendation</a>
    </button>
</div>

<div class="data-table">
    <table>
        <thead>
        <tr>
            <td><b>Main Guideline</b></td>
            <td><b>Sub Guideline</b></td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['main_guideline'] ?></td>
                <td><?= $row['sub_guideline'] ?></td>
                 <td>
                 <a href="./edit.php?main_guideline=<?= $row['main_guideline'] ?>">Edit</a>
                    <a href="./delete.php?main_guideline=<?= $row['main_guideline'] ?>">Delete</a><!--
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