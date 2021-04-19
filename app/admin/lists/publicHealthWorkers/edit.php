<?php
require_once('../../../../config/db_connect.php');

$old_license = $_GET['license'];


if(isset($_POST["license"])) {
    $sql = "UPDATE wec353_4.publichealthworker SET license = '" . $_POST["license"] . "' WHERE license = '" .$old_license. "';";
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        header("Location: .");
    }else {
        header("Location: ./edit.php?license=". $_POST["license"]);
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
<h1>Edit a Licence</h1>

<form action="./edit.php?license=<?=$_GET["license"]?>" method="post">
    <label for="new_license">License </label><br>
    <input type="text" name="license" id="license" value="<?=$_GET["license"]?>"> <br>

    <button type="submit">Update</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
