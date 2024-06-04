<?php
include "../lib/db_connect.php";

$id = $_GET['id'];
$sql = "DELETE FROM tbl_tour WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // output data of each row
    echo "Delete successfully <a href='../pages/admin/admin_tour.php'>Go back home</a>" . "<br>";
} else {
    echo "Error";
}


mysqli_close($conn);

?>
