<?php
require_once('../../../../config/db_connect.php');
if(isset($_POST["region"]) && isset($_POST["city"])) {
   $sql = "INSERT INTO wec353_4.Region VALUES ('".$_POST["city"]."' , '".$_POST["region"]."')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: .");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
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
    <h1>Add a new region</h1>

    <form action="./create.php" method="post">
        <label for="region">Region name</label><br>
        <input type="text" name="region" id="region"> <br>
        <label for="city">Enter a city in this region</label> <br>
        <input type="text" name="city" id="city"> <br>
        <button type="submit">Add</button>
    </form>

    <footer class="footer">
        <a href="../">Back</a>
    </footer>

</body>
</html>
