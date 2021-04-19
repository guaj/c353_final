<?php
require_once('../../../../config/db_connect.php');

$old_region = $_GET['name'];


if(isset($_POST["name"])) {
    $sql = "UPDATE wec353_4.groupzone SET name = '" . $_POST["name"] . "' WHERE name = '" .$old_region. "';";
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        header("Location: .");
    }else {
        header("Location: ./edit.php?name=". $_POST["name"]);
    }





}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Edit a region</h1>

<form action="./edit.php?name=<?=$_GET["name"]?>" method="post">
    <label for="new_region">Name</label><br>
    <input type="text" name="name" id="name" value="<?=$_GET["name"]?>"> <br>

    <button type="submit">Update</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
