<?php
require_once('../../../../config/db_connect.php');
if(isset($_POST["main_guideline"]) && isset($_POST["sub_guideline"])) {
   $sql = "INSERT INTO wec353_4.guideline VALUES ('".$_POST["main_guideline"]."' , '".$_POST["sub_guideline"]."')";
   echo $sql;
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
    <h1>Add a new recommendation</h1>

    <form action="./create.php" method="post">
        <label for="name"><b>Main Guideline</b></label><br>
        <input type="text" name="main_guideline" id="main_guideline"> <br>
        <label for="group_type"><b>Sub Guideline</b></label> <br>
        <input type="text" name="sub_guideline" id="sub_guideline"> <br>
        <button type="submit">Add</button>
    </form>

    <footer class="footer">
        <a href="../">Back</a>
    </footer>

</body>
</html>
