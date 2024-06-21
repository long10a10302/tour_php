<?php
include '../lib/function.php';
$sql = "SELECT * FROM tbl_user";
$result = $conn->query($sql);
// Bảo vệ đối với các tham số đầu vào mặc
$inputUsername = isset($_REQUEST['username']) ? htmlspecialchars($_REQUEST['username']) : '';
$inputPassword = isset($_REQUEST['password']) ? htmlspecialchars($_REQUEST['password']) : '';
session_start();

// Kiểm tra kết nối và số lượng kết quả trả về
if ($result && $result->num_rows > 0) {
    $loginError = 'username_fail'; // Giả định định là sai username nếu không có kết quả

    // Lặp qua các hàng kết quả
    while($row = $result->fetch_assoc()) {
        // Lấy thông tin tài khoản và mật khẩu từ cơ sở dữ liệu
        $dbUsername = $row['username'];
        $dbPassword = $row['password'];

        // Kiểm tra thông tin đăng nhập
        if ($inputUsername === $dbUsername) {
            if ($inputPassword === $dbPassword) {
                // Đăng nhập thành công
                setcookie('user_id', 'admin', time() + 300, "/");
                $loginError = ''; // Xóa thông báo lỗi nếu có
                $status = 'login_success';
                break; // Thoát vòng lặp sau khi tìm thấy kết quả đúng
            } else {
                // Sai mật khẩu
                $loginError = 'password_fail';
            }
        }else{
            $loginError = 'username_fail';
        }
    }
}

// Đóng kết nối MySQL
$conn->close();

// Xử lý ghi nhớ mật khẩu nếu được chọn
if (isset($_REQUEST['rememberPass']) && $_REQUEST['rememberPass'] === 'pass' && $status === 'login_success') {
    // Nếu muốn ghi nhớ mật khẩu
    setcookie('username', $inputUsername, time() + 3600, '/');
    setcookie('password', $inputPassword, time() + 3600, '/');
}

// In ra thông báo đăng nhập thành công hoặc thông báo lỗi
if (!empty($loginError)) {
    echo $loginError; // In ra lỗi đăng nhập nếu có
} else {
    echo $status; // In ra trạng thái đăng nhập
}
?>
