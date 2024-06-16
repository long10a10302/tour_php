<?php
include '../lib/db_connect.php';
$userName = isset($_POST['uname']) ? $_POST['uname'] : '';
$passWord = isset($_POST['psw']) ? $_POST['psw'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

if(!empty($userName) && !empty($passWord) && !empty($email)){
    $sql = "INSERT INTO tbl_admin (username, password, email, role) VALUES ('$userName', '$passWord', '$email', 'user')";
    if(mysqli_query($conn, $sql)){
        echo 'Đăng ký user thành công';
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>