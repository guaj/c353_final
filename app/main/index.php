<?php require_once("../../config/db_connect.php");

$sql2 = "select * from publichealthfacility;";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM wec353_4.diagnosis WHERE medicare_no = '".$_GET["medicare_no"]."';";
$result3 = $conn->query($sql3);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>COVID APP</title>
</head>
<body>


<h1>Choose one of the following options</h1>
<a href="./list_of_facility.php?medicare_no=<?=$_GET["medicare_no"]?>">See the list of facilities where I can get tested</a><br><br>
<a href="./testhistory.php?medicare_no=<?=$_GET["medicare_no"]?>">See my test history</a><br><br>
<?php

    $latest_result = "1900-01-01";

    while ($row = $result3->fetch_assoc()) {
        if ($row["date_of_result"] > $latest_result)
            $latest_result = $row["date_of_result"];
    }


    $limit_date = date("Y-m-d", strtotime("-2 week"));
    $today_date = date("Y-m-d", strtotime("now"));

    //echo "Latest result: " . $latest_result;

    if (($latest_result >= $limit_date) && ($latest_result <= $today_date)) {
        echo "<a href=\"./sendForm.php?medicare_no=".$_GET["medicare_no"]."\">Complete your symptom form</a><br><br>";
    }
    ?>


</body>
</html>
