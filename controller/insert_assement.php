<?php
include '../lib/db_connect.php';
$idBlog = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$phonenumber = $_GET['phonenumber'];
$content = $_GET['content'];

$sql = "INSERT INTO tbl_assement (name,email,phonenumber,content_assement,id_blog) VALUES ('$name', '$email', '$phonenumber', '$content','$idBlog')";

if(mysqli_query($conn,$sql)){
    echo 'Create assement successfull';
}else{
    echo "Error: " . mysqli_error($conn);
}

?>