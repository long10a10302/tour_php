<?php
include '../lib/db_connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$status = isset($_GET['status']) ? $_GET['status'] : '';



$sql = "UPDATE tbl_rls_tour_customer SET status_booking = '$status' WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Dữ liệu đã được cập nhật thành công.";
} else {
    echo 'Lỗi cập nhật' . mysqli_error($conn);
}
?>

