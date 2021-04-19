<?php
require_once('../../../../config/db_connect.php');
if(isset($_POST["name"]) && isset($_POST["group_type"])) {
    $sql = "INSERT INTO wec353_4.groupzone VALUES ('".$_POST["group_type"]."' , '".$_POST["name"]."')";
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
<h1>Add a new group zone</h1>

<form action="./create.php" method="post">
    <label for="name">Group zone name</label><br>
    <input type="text" name="name" id="name"> <br>
    <label for="group_type">Enter a group type</label> <br>
    <input type="text" name="group_type" id="group_type"> <br>
    <button type="submit">Add</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
