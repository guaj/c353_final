<?php
require_once('../../../../config/db_connect.php');
if(isset($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["date_of_birth"]) &&
    isset($_POST["primary_phone"]) &&
    isset($_POST["primary_email"]) &&
    isset($_POST["civic_address"]) &&
    isset($_POST["postal_code"]) &&
    isset($_POST["medicare_no"]) &&
    isset($_POST["canadian_citizen"])) {

    $is_canadian = 'TRUE';
    if ($_POST["canadian_citizen"] == 0) {
        $is_canadian = "FALSE";
    }

    $sql = "INSERT INTO wec353_4.person VALUES (
                                    '".$_POST["medicare_no"]."' ,
                                    '".$_POST["first_name"]."' ,
                                    '".$_POST["last_name"]."' ,
                                    '".$_POST["date_of_birth"]."' , 
                                     ".$is_canadian." ,
                                    '".$_POST["primary_phone"]."' ,
                                    '".$_POST["primary_email"]."' ,
                                    '".$_POST["civic_address"]."' ,
                                    '".$_POST["postal_code"]."')";
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
<h1>Add a new person</h1>

<form action="./create.php" method="post">
    <label for="first_name">First name</label><br>
    <input type="text" name="first_name" id="first_name"> <br>
    <label for="last_name">Last name</label> <br>
    <input type="text" name="last_name" id="last_name"> <br>
    <label for="date_of_birth">Date of birth</label> <br>
    <input type="date" name="date_of_birth" id="date_of_birth"> <br>
    <label for="primary_phone">Phone</label> <br>
    <input type="tel" id="primary_phone" name="primary_phone" required><br>
    <small>Format: 123-453-3678</small><br>
    <label for="primary_email">Email</label> <br>
    <input type="email" name="primary_email" id="primary_email"> <br>
    <label for="civic_address">Address</label> <br>
    <input type="text" name="civic_address" id="civic_address"> <br>
    <label for="postal_code">Postal Code</label> <br>
    <input type="text" name="postal_code" id="postal_code" required> <br>
    <label for="medicare_no">Medicare number</label> <br>
    <input type="text" name="medicare_no" id="medicare_no"> <br>
    <label for="canadian_citizen">Is it a canadian citizen? (Yes = 1; No = 0)</label> <br>
    <input type="number" name="canadian_citizen" id="canadian_citizen"> <br> <br>

    <button type="submit">Add</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
