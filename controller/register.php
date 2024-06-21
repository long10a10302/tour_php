<?php
include '../lib/db_connect.php';
$userName = isset($_POST['uname']) ? $_POST['uname'] : '';
$passWord = isset($_POST['psw']) ? $_POST['psw'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

if(!empty($userName) && !empty($passWord) && !empty($email)){
    $sql = "INSERT INTO tbl_user (username, password) VALUES ('$userName', '$passWord')";
    if(mysqli_query($conn, $sql)){
        echo 'Đăng ký user thành công';
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$query = "SELECT * FROM tbl_user";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
    $idUser = $row['id_user'];
}
mysqli_query($conn,"INSERT INTO tbl_customer (phonenumber,name_customer,email,id_user) VALUES  ('$phone','$name','$email','$idUser')");
?>