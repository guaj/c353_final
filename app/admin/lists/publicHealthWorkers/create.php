<?php
require_once('../../../../config/db_connect.php');
if(isset($_POST["medicare_number"]) && isset($_POST["license"])) {
   $sql = "INSERT INTO wec353_4.publichealthworker VALUES ('".$_POST["medicare_number"]."' , '".$_POST["license"]."')";
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
    <h1>Add a new worker</h1>

    <form action="./create.php" method="post">
        <label for="medicare_number">Medicare number</label><br>
        <input type="text" name="medicare_number" id="medicare_number"> <br>
        <label for="license">Enter a license</label> <br>
        <input type="text" name="license" id="license"> <br>
        <button type="submit">Add</button>
    </form>

    <footer class="footer">
        <a href="../">Back</a>
    </footer>

</body>
</html>
