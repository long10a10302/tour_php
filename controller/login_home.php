<?php
include '../lib/function.php';

$sql = "SELECT * FROM tbl_user";
$result = $conn->query($sql);

$inputUsername = isset($_REQUEST['username']) ? htmlspecialchars($_REQUEST['username']) : '';
$inputPassword = isset($_REQUEST['password']) ? htmlspecialchars($_REQUEST['password']) : '';

session_start();

if ($result && $result->num_rows > 0) {
    $loginError = 'username_fail';

    while($row = $result->fetch_assoc()) {
        $dbUsername = $row['username'];
        $dbPassword = $row['password'];
        $id_user = $row['id_user'];

        if ($inputUsername === $dbUsername) {
            if ($inputPassword === $dbPassword) {
                setcookie('user_id', 'admin', time() + 300, "/");
                $loginError = '';
                $status = 'login_success';
                echo $status . '_' . $id_user; // Trả về login_success và id_user
                break;
            } else {
                $loginError = 'password_fail';
            }
        }
    }
}

$conn->close();

if (isset($_REQUEST['rememberPass']) && $_REQUEST['rememberPass'] === 'pass' && $status === 'login_success') {
    setcookie('username', $inputUsername, time() + 3600, '/');
    setcookie('password', $inputPassword, time() + 3600, '/');
}

if (!empty($loginError)) {
    echo $loginError;
}
?>

