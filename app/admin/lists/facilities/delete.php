<?php require_once('../../../../config/db_connect.php');

$sql = "DELETE FROM wec353_4.PublicHealthFacility WHERE facility_id = '" . $_GET['facility_id'] . "';";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: .");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
