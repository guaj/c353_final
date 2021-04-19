<?php require_once('../../../../config/db_connect.php');

$sql = "DELETE FROM wec353_4.groupzone WHERE group_type = '" . $_GET['group_type'] . "';";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: .");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
