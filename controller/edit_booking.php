<?php
include '../lib/db_connect.php';



if (mysqli_query($conn, $sql)) {
    echo 'cập nhật dữ liệu thành công';
    //header('Location: admin_booking.php');
} else {
    echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="../pages/admin/admin_tour.php" method="POST">

    name <input type="text" name="name" id="" value="<?= $nameValue ?>">
    email
    price <input type="text" name="price" id="" value="<?= $priceValue ?>">
    day <input type="text" name="day" id="" value="<?= $dayValue ?>">
    Plan: <textarea name="plan" id="" cols="50" rows="50" ><?=$planValue?></textarea><br>
    <input type="submit" value="Update">
</form>
</body>
</html>
