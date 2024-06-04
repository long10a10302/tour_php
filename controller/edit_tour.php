<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour</title>
    <link rel="stylesheet" href="../asset/css/form.css">

</head>
<body>
<?php
include "../lib/db_connect.php";

// Xác định id và kiểm tra giá trị
$id = $_GET['id'] ?? '';
$id = mysqli_real_escape_string($conn, $id);

// Kiểm tra xem id có tồn tại trong bảng không
$value = "SELECT * FROM tbl_tour WHERE id = '$id'";
$result = mysqli_query($conn, $value);
echo $result; die();
$row = mysqli_fetch_assoc($result);
echo $row; die();
if ($row) {
    // Lấy giá trị từ cơ sở dữ liệu
    $idValue = $row['id'];
    $nameValue = $row['name'];
    $descriptionValue = $row['description'];
    $priceValue = $row['price'];
    $dayValue = $row['day'];

    // Kiểm tra xem có yêu cầu cập nhật không
    if (isset($_GET['name'], $_GET['description'], $_GET['price'], $_GET['day'])) {
        // Lấy giá trị cần cập nhật từ tham số GET
        $nameSet = $_GET['name'];
        $descriptionSet = $_GET['description'];
        $priceSet = $_GET['price'];
        $daySet = $_GET['day'];

        // Cập nhật dữ liệu
        $sql = "UPDATE tbl_tour SET name = '$nameSet', description = '$descriptionSet', day = '$daySet', price = '$priceSet' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Dữ liệu đã được cập nhật thành công.";
        } else {
            echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn);
        }
    }
}
?>

<form action="../pages/admin/admin_tour.php" method="GET">
    id <input type="text" name="id" id="" value="<?= $idValue ?>">
    name <input type="text" name="name" id="" value="<?= $nameValue ?>">
    description <input type="text" name="description" id="" value="<?= $descriptionValue ?>">
    price <input type="text" name="price" id="" value="<?= $priceValue ?>">
    day <input type="text" name="day" id="" value="<?= $dayValue ?>">
    <input type="submit" value="Update">
</form>
</body>
</html>