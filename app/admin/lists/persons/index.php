<?php
require_once('../../../../config/db_connect.php');
$query = 'SELECT * from wec353_4.Person';
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

<h1>List of Persons</h1>

<div class="add-btn">
    <button>
        <a href="./create.php">Add a new person</a>
    </button>
</div>

<div class="data-table">
    <table>
        <thead>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Date of Birth</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Address</td>
            <td>Postal Code</td>
            <td>Medicare Number</td>
            <td>Canadian Citizen</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['first_name'] ?></td>
                <td><?= $row['last_name'] ?></td>
                <td><?= $row['date_of_birth'] ?></td>
                <td><?= $row['primary_phone'] ?></td>
                <td><?= $row['primary_email'] ?></td>
                <td><?= $row['civic_address'] ?></td>
                <td><?= $row['postal_code'] ?></td>
                <td><?= $row['medicare_no'] ?></td>
                <td><?= $row['canadian_citizen'] ?></td>
                <td>
                    <a href="./edit.php?medicare_no=<?= $row['medicare_no'] ?>">Edit</a>
                    <a href="./delete.php?medicare_no=<?= $row['medicare_no']?>">Delete</a><!--
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
