<?php
include '../lib/db_connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";

$sql = 'DELETE FROM tbl_rls_tour_customer WHERE id= '.$id.'';
if(mysqli_query($conn, $sql)){
    echo 'Huỷ tour thành công';
}else{
    echo 'Lôi huỷ tour' . mysqli_error($conn);
}
?>