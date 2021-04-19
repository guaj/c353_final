<?php
require_once('../../../../config/db_connect.php');

$on_init = "SELECT * FROM wec353_4.guideline WHERE main_guideline = '" .$_GET['main_guideline']. "';";
$result = $conn->query($on_init);

if(isset($_POST["sub_guideline"])&& isset($_POST["main_guideline"])) {
    $sql = "UPDATE wec353_4.guideline SET main_guideline = '" . $_POST["main_guideline"] . "',sub_guideline = '" . $_POST["sub_guideline"] . "'  WHERE main_guideline = '" .$_GET['main_guideline']. "';";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        header("Location: .");
    }else {
        header("Location: ./edit.php?main_guideline=". $_POST["main_guideline"] );
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
<h1>Edit a recommendation</h1>

<form action="./edit.php?main_guideline=<?=$_GET["main_guideline"]?>" method="post">

<?php
    while ($row = $result->fetch_assoc()) { ?>
    <label for="main_guideline">Main Guideline</label><br>
    <input type="text" name="main_guideline" id="main_guideline" value="<?=$row["main_guideline"]?>"> <br>
    
    <label for="sub_guideline">Sub Guideline</label><br>
    <input type="text" name="sub_guideline" id="sub_guideline" value="<?=$row["sub_guideline"]?>"> <br>
    <?php  }?>

    

    <button type="submit">Update</button>
</form>

<footer class="footer">
    <a href="../">Back</a>
</footer>

</body>
</html>
