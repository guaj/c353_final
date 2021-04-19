<?php
require_once('config/db_connect.php');

$sql = "SELECT * FROM wec353_4.user_table WHERE medicare_no = '"
            .$_GET["username"] . "' AND date_of_birth = '" . $_GET["password"] . "';";
$user = "";
$is_admin = "";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $user = $row["medicare_no"];
    $is_admin = $row["admin_rights"];
}

if ($user) {
    if ($is_admin) {
        header("Location: ./app/admin/index.php?medicare_no=".$user);
    } else
        header("Location: ./app/main/index.php?medicare_no=".$user);
}
else
    header("Location: ./");
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


<div>
    <h2>Choose a section</h2>
    <a href="./app/admin/">Admin user</a> <br><br>
    <a href="./app/main/index.php?medicare_no="<?=$_GET["username"]?>>Regular user</a>
</div>



</body>
</html>
