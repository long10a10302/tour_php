<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../asset/css/form.css">

</head>
<body>
<?php
include "../lib/db_connect.php";

// Xác định id và kiểm tra giá trị
$id = $_GET['id'] ?? '';
$id = mysqli_real_escape_string($conn, $id);

// Kiểm tra xem id có tồn tại trong bảng không
$sql = "SELECT * FROM tbl_blog WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idValue = $row['id'];
    $titleValue = $row['title'];
    $contentValue = $row['content'];
}

// Lấy giá trị từ cơ sở dữ liệu


// Kiểm tra xem có yêu cầu cập nhật không

// Lấy giá trị cần cập nhật từ tham số GET
if(isset($_GET['title']) && isset($_GET['content'])){
    $titleSet = $_GET['title'];
    $contentSet = $_GET['content'];
}
$timeSet = date('Y-m-d H:i:s');


// Cập nhật dữ liệu
$sql = "UPDATE tbl_blog SET title = '$titleSet', content = '$contentSet',time_create = '$timeSet' WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "Dữ liệu đã được cập nhật thành công.";
} else {
    echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn);
}

?>

<form action="../pages/admin/admin_blog.php" method="GET">
    id <input type="text" name="id" id="" value="<?= $idValue ?>">
    name <input type="text" name="title" id="" value="<?= $titleValue ?>">
    description <input type="text" name="content" id="" value="<?= $contentValue ?>">

    <input type="submit" value="Update">
</form>
</body>
</html>