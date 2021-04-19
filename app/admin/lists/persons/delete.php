<?php require_once('../../../../config/db_connect.php');

$sql = "DELETE FROM wec353_4.Person WHERE medicare_no = '" . $_GET['medicare_no'] . "';";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: .");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
