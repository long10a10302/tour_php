<?php
include '../lib/db_connect.php';

$sql = "SELECT username, password FROM tbl_admin";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$userName = $row['username'];
$passWord = $row['password'];
if (isset($_REQUEST['username']) && $_REQUEST['username'] === $userName) {
    if (isset($_REQUEST['password']) && $_REQUEST['password'] === $passWord) {
        $status = 'login_success';
        setcookie('user_id', 'admin', time() + 300, "/");
    } else {
        $status = 'password_fail';
    }
} else {
    $status = 'username_fail';
}

if (isset($_REQUEST['rememberPass']) && $_REQUEST['rememberPass'] === 'pass') {
    if (isset($_REQUEST['password']) && $_REQUEST['password'] === $passWord) {
        setcookie('username', $userName, time() + 3600, '/');
        setcookie('password', $passWord, time() + 3600, '/');
    }
}
echo $status;
?>

