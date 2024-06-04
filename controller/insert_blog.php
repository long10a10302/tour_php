<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    include '../lib/db_connect.php';

    // Lấy dữ liệu từ biểu mẫu
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $imgID = $_REQUEST['img_id'];
    $status = $_REQUEST['status'];

    // Thực hiện truy vấn chèn dữ liệu
    if (empty($title) && empty($content) && empty($imgID)) {
        echo 'Dữ liệu trống vui lòng nhập dữ liệu';
    } else {
        $sql = "INSERT INTO tbl_blog (title, content, img_id, status) VALUES ('$title', '$content', '$imgID', '$status')";

        if (mysqli_query($conn, $sql)) {
            echo "Blog created successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }
    // Đóng kết nối
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Blog</title>
    <link rel="stylesheet" href="../asset/css/form.css">
</head>
<body>
<h1>Create Blog</h1>
<?php include '../lib/form_upload.php'; ?>
<form action="  " method="POST">
    Title: <input type="text" name="title" required><br>
    Content: <input type="text" name="content" required><br>
    Imgid: <input type="text" name="img_id" required><br>
    Status <input type="text" name="status" id="">
    <input type="submit" value="Create">
</form>

</body>
</html>