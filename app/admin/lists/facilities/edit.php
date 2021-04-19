<?php
require_once('../../../../config/db_connect.php');
$on_init = "SELECT * FROM wec353_4.publichealthfacility WHERE facility_id = '" .$_GET['facility_id']. "';";
$result = $conn->query($on_init);


if(isset($_POST["facility_id"]) &&
    isset($_POST["name"]) &&
    isset($_POST["address"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["url"]) &&
    isset($_POST["facility_type"])
) {

    $sql = "UPDATE wec353_4.PublicHealthFacility SET facility_id = '" . $_POST["facility_id"] . "', 
                                        facility_id = '" . $_POST["facility_id"] . "', 
                                        name = '" . $_POST["name"] . "', 
                                        address = '" . $_POST["address"] . "', 
                                        phone = '" . $_POST["phone"] . "', 
                                        url = '" . $_POST["url"] . "', 
                                        facility_type = '" . $_POST["facility_type"] . "'
                                        WHERE facility_id = '" .$_GET['facility_id']. "';";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: .");
    } else {
        header("Location: ./edit.php?facility_id=". $_POST["facility_id"]);
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
<h1>Edit a facility</h1>

<form action="./edit.php?facility_id=<?=$_GET["facility_id"]?>" method="post">
    <?php
    while ($row = $result->fetch_assoc()) { ?>
        <label for="facility_id">Facilty Id</label><br>
        <input type="text" name="facility_id" id="facility_id" value="<?=$row["facility_id"]?>"> <br>
        <label for="name">Facility Name</label> <br>
        <input type="text" name="name" id="name" value="<?=$row["name"]?>"> <br>
        <label for="address">Address</label> <br>
        <input type="text" name="address" id="address" value="<?=$row["address"]?>"> <br>
        <label for="phone">Phone</label> <br>
        <input type="text" id="phone" name="phone"   value="<?=$row["phone"]?>" ><br>
        <label for="url">url</label> <br>
        <input type="text" name="url" id="url" value="<?=$row["url"]?>"> <br>
        <label for="facility_type">Facility Type</label> <br>
        <input type="text" name="facility_type" id="facility_type" value="<?=$row["facility_type"]?>"> <br>
        <br>
    <?php  }?>
    <button type="submit">Update</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
