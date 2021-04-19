<?php
require_once('../../../../config/db_connect.php');


if(isset($_POST["region"])) {

    $sql = "UPDATE wec353_4.Region SET region = '" . $_POST["region"] . "' WHERE region = '" .$_GET['region']. "';";

    if ($conn->query($sql) === TRUE) {
        header("Location: .");
    }else {
        header("Location: ./edit.php?region=". $_POST["region"]);
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

<form action="./edit.php?region=<?=$_GET["region"]?>" method="post">
    <label for="new_region">Region name</label><br>
    <input type="text" name="region" id="region" value="<?=$_GET["region"]?>"> <br>

    <button type="submit">Update</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
