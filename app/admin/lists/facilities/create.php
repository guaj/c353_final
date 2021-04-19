<?php
require_once('../../../../config/db_connect.php');

if(isset($_POST["facility_id"]) &&
    isset($_POST["name"])  &&
    isset($_POST["address"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["url"]) &&
    isset($_POST["facility_type"])) {
    $sql = "INSERT INTO wec353_4.publichealthfacility VALUES (
                                                  '".$_POST["facility_id"]."' , 
                                                  '".$_POST["name"]."',
                                                  '".$_POST["address"]."' ,
                                                  '".$_POST["phone"]."',
                                                  '".$_POST["url"]."',
                                                  '".$_POST["facility_type"]."')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        header("Location: .");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new facility</title>
</head>
<body>
<h1>Add new Facility</h1>
    <form action="./create.php" method="post">
    <label for="facility_id">Facility Id </label><br>
    <input type="text"  name="facility_id" id="facility_id"><br>
    <label for="name">Name</label><br>
    <input type="text"  name="name" id="name"><br>
    <label for="address">Address</label><br>
    <input type="text"  name="address" id="address"><br>
    <label for="phone">Phone</label><br>
    <input type="text"  name="phone" id="phone"><br>
    <label for="url">URL</label><br>
    <input type="text"  name="url" id="url"><br>
    <label for="facility_type">Facility Type</label><br>
    <input type="text"  name="facility_type" id="facility_type"><br>
    
    <button type = "submit">Add</button>
    </form>
    <a href="./">Back</a>
</body>
</html>
