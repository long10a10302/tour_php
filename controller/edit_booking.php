<?php
include '../lib/db_connect.php';

$sql = "UPDATE tbl_rls_tour_customer SET status_booking = 'đã_xác_nhận' ";


if (mysqli_query($conn, $sql)) {
    echo 'cập nhật dữ liệu thành công';
    //header('Location: admin_booking.php');
} else {
    echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn);
}
?>