<?php
    include '../lib/db_connect.php';
if(isset($_GET['countClick'])){
    echo $count = $_GET['countClick'] .'<br>';
    echo $id = $_GET['id'];
    $sql = "UPDATE tbl_blog SET count_like = '$count' WHERE id = '$id'";
    mysqli_query($conn,$sql);
}
?>