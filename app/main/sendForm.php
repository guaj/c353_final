<?php require_once("../../config/db_connect.php");

$sql = "SELECT * FROM wec353_4.diagnosis WHERE medicare_no = '".$_GET["medicare_no"]."';";
$result = $conn->query($sql);

$latest_result = "1900-01-01";
$license = "";
$facility_id = "";
$latest_test = "";
while ($row = $result->fetch_assoc()) {
    if ($row["date_of_result"] > $latest_result) { // retrieve the latest result
        $license = $row["license"];
        $facility_id = $row["facility_id"];
        $latest_test = $row["date_of_test"];
    }
}

$fever = 0;
$cough = 0;
$breathing = 0;
$smell_taste_loss = 0;
$today_date = date( "Y-m-d", strtotime("now"));

if (isset($_POST["temperature"])) {
    if (isset($_POST["fever"]))
        $fever = 1;
    if (isset($_POST["cough"]))
        $cough = 1;
    if (isset($_POST["breathing"]))
        $breathing = 1;
    if (isset($_POST["smell_taste_loss"]))
        $smell_taste_loss = 1;
    $sql = "INSERT INTO wec353_4.symptomhistory VALUE (
                    '". $_GET["medicare_no"]. "',
                    '". $license . "',
                    '". $facility_id . "',
                    '". $latest_test . "',
                    '". $today_date . "',
                    '". $_POST["temperature"] . "',
                    '". $fever . "',
                    '". $cough . "',
                    '". $breathing . "',
                    '". $smell_taste_loss . "',
                    '". $_POST["other"] . "'
                    );";
    if($conn->query($sql) === TRUE){
        header("Location: ./index.php?medicare_no=".$_GET["medicare_no"]);
    }
    else
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
    // medicare_no, license, facility_di, date_of_test, entry_date, temperature, fever, cough, breathing, smell_taste_loss, other
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
<div id="tab2" class="tab-content">
    <br>
    <form action="./sendForm.php?medicare_no=<?=$_GET["medicare_no"]?>" method="post">

        <h3>Please check your corresponding symptoms</h3>
        <input type="checkbox" id="fever" name="fever" value="1">
        <label for="fever">Fever</label><br>

        <input type="checkbox" id="cough" name="cough" value="1">
        <label for="cough">Dry cough</label><br>

        <input type="checkbox" id="breathing" name="breathing" value="1">
        <label for="breathing">Breathing difficulties</label><br>

        <input type="checkbox" id="smell_taste_loss" name="smell_taste_loss" value="1">
        <label for="smell_taste_loss">Smell or taste loss</label><br> <br>

        <label for="temperature">What is your temperature?</label>
        <input type="number" id="temperature" name="temperature"><br> <br>

        <label for="other">Other symptoms</label>
        <input type="text" id="other" name="other"><br>

        <br>
        <input type="submit" value="Submit">
    </form>

    <footer>
        <a href="./index.php?medicare_no=<?=$_GET["medicare_no"]?>">Back </a>
    </footer>
</div>
</body>
</html>
