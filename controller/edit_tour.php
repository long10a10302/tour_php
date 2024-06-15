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
include "../lib/function.php";

// Xác định id và kiểm tra giá trị
$id = $_GET['id'] ?? '';
$id = mysqli_real_escape_string($conn, $id);

// Kiểm tra xem id có tồn tại trong bảng không
$tours = getTour($id);
foreach($tours as $key => $row){
    $idValue = $row['id'];
    $nameValue = $row['name'];
    $descriptionValue = $row['description'];
    $priceValue = $row['price'];
    $dayValue = $row['day'];
    $noteValue = $row['note'];
    $planValue = $row['plan_tour'];
    $imgValue = $row['img_id'];
    $statusValue = $row['status'];
}

if ($row) {
    // Lấy giá trị từ cơ sở dữ liệu


    // Kiểm tra xem có yêu cầu cập nhật không
    if (isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['day'])) {
        // Lấy giá trị cần cập nhật từ tham số POST
        $nameSet = $_POST['name'];
        $descriptionSet = $_POST['description'];
        $priceSet = $_POST['price'];
        $daySet = $_POST['day'];
        $noteSet = $row['note'];
        $planSet = $row['plan_tour'];

        // Cập nhật dữ liệu
        $sql = "UPDATE tbl_tour SET name = '$nameSet', description = '$descriptionSet', day = '$daySet', price = '$priceSet',note = '$noteSet',plan_tour = '$planSet' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Dữ liệu đã được cập nhật thành công.";
        } else {
            echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn);
        } 
    }
}
?>

<form action="../pages/admin/admin_tour.php" method="POST">
   
    name <input type="text" name="name" id="" value="<?= $nameValue ?>">
    description <textarea name="description" id="" cols="50" rows="50"><?=$descriptionValue?></textarea>
    price <input type="text" name="price" id="" value="<?= $priceValue ?>">
    day <input type="text" name="day" id="" value="<?= $dayValue ?>">
    Plan: <textarea name="plan" id="" cols="50" rows="50" ><?=$planValue?></textarea><br>
    <input type="submit" value="Update">
</form>
</body>
</html>