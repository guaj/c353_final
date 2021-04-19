<?php
require_once('../../../../config/db_connect.php');
echo  $_GET['medicare_no'];
$on_init = "SELECT * FROM wec353_4.person WHERE medicare_no = '" .$_GET['medicare_no']. "';";
$result = $conn->query($on_init);


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

    $sql = "UPDATE wec353_4.person SET first_name = '" . $_POST["first_name"] . "', 
                                        last_name = '" . $_POST["last_name"] . "', 
                                        date_of_birth = '" . $_POST["date_of_birth"] . "', 
                                        primary_phone = '" . $_POST["primary_phone"] . "', 
                                        primary_email = '" . $_POST["primary_email"] . "', 
                                        civic_address = '" . $_POST["civic_address"] . "', 
                                        postal_code = '" . $_POST["last_name"] . "', 
                                        canadian_citizen = '" .$is_canadian . "' 
                                        WHERE medicare_no = '" .$_GET['medicare_no']. "';";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: .");
    } else {
        header("Location: ./edit.php?medicare_no=". $_POST["medicare_no"]);
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
<h1>Edit a person info</h1>

<form action="./edit.php?medicare_no=<?=$_GET["medicare_no"]?>" method="post">
    <?php
    while ($row = $result->fetch_assoc()) { ?>
    <label for="first_name">First name</label><br>
    <input type="text" name="first_name" id="first_name" value="<?=$row["first_name"]?>"> <br>
    <label for="last_name">Last name</label> <br>
    <input type="text" name="last_name" id="last_name" value="<?=$row["last_name"]?>"> <br>
    <label for="date_of_birth">Date of birth</label> <br>
    <input type="date" name="date_of_birth" id="date_of_birth" value="<?=$row["date_of_birth"]?>"> <br>
    <label for="primary_phone">Phone</label> <br>
    <input type="text" id="primary_phone" name="primary_phone"   value="<?=$row["primary_phone"]?>" ><br>
    <small>Format: 123-453-6789</small><br>
    <label for="primary_email">Email</label> <br>
    <input type="email" name="primary_email" id="primary_email" value="<?=$row["primary_email"]?>"> <br>
    <label for="civic_address">Address</label> <br>
    <input type="text" name="civic_address" id="civic_address" value="<?=$row["civic_address"]?>"> <br>
    <label for="postal_code">Postal Code</label> <br>
    <input type="text" name="postal_code" id="postal_code" value="<?=$row["postal_code"]?>" required> <br>
    <label for="canadian_citizen">Is it a canadian citizen? (Yes = 1; No = 0)</label> <br>
    <input type="number" name="canadian_citizen" id="canadian_citizen" value="<?=$row["canadian_citizen"]?>"> <br> <br>
    <?php  }?>

    <button type="submit">Update</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
