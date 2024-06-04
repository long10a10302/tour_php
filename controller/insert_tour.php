<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    include '../lib/db_connect.php';

    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $day = $_POST['day'];
    $imgId = $_POST['img_id'];
    $status = $_POST['status'];
    $plan = $_POST['plan'];
    // Thực hiện truy vấn chèn dữ liệu
    $sql = "INSERT INTO tbl_tour (name,note, price, day,img_id,status,plan_tour) VALUES ('$name', '$description', '$price', '$day','$imgId','$status','$plan')";
    if (mysqli_query($conn, $sql)) {
        echo "Tour created successfully";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Tour</title>
    <link rel="stylesheet" href="../asset/css/form.css">
</head>
<body>
<h1>Create Tour</h1>
<?php include '../lib/form_upload.php'; ?>

<form action="  " method="POST">
    Name: <input type="text" name="name" required><br>
    Note: <textarea name="description" id="" cols="50" rows="50"></textarea><br>
    Price: <input type="number" name="price" required><br>
    Day: <input type="text" name="day" required><br>
    Img_id <input type="text" name="img_id" required><br>
    Status <input type="text" name="status" required><br>
    Plan: <textarea name="plan" id="" cols="50" rows="50"></textarea><br>


    <input type="submit" value="Create">
</form>

</body>
</html>