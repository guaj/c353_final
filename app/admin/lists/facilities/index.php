<?php
require_once('../../../../config/db_connect.php');
$query = 'SELECT * FROM wec353_4.PublicHealthFacility';
$result = $conn->query($query);
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

<h1>List of Facilities</h1>
<a href="./create.php">Add a new facility</a>
<div class="data-table">
    <table>
        <thead>
        <tr>
            <td>Facility ID</td>
            <td>Name</td>
            <td>Address</td>
            <td>Phone</td>
            <td>URL</td>
            <td>Facility Type</td>
            <td>Edit Delete</td>

        </tr>
        </thead>
        <tbody>
       <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
               <td><?=$row["facility_id"] ?></td>
                <td><?=$row["name"] ?></td>
                <td><?=$row["address"] ?></td>
                <td><?=$row["phone"] ?></td>
                <td><?=$row["url"] ?></td>
                <td><?=$row["facility_type"] ?></td>
               <td> 
                 <a href="./edit.php?facility_id=<?= $row["facility_id"]?>">Edit</a>
                 <a href="./delete.php?facility_id=<?= $row["facility_id"]?>">Delete</a>
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