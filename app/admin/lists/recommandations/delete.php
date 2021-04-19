<?php require_once('../../../../config/db_connect.php');

$sql = "DELETE FROM wec353_4.guideline WHERE main_guideline = '" . $_GET['main_guideline'] . "';";
$result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: .");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>
