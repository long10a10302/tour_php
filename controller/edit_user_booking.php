<?php
include '../lib/function.php';

$customers = getCustomerTour();

foreach($customers as $key => $row){
    $nameTourValue = $row['name'];
    $nameCustomerValue = $row['name_customer'];
    $emailValue = $row['email'];
    $phoneValue = $row['phonenumber'];
    $dayValue = $row['day_go'];
    $adultsValue = $row['adults'];
    $childrenNine = $row['children_nine'];
    

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
<form action="" method = 'POST'>
    Tour đã đặt: <input type="text" name="name_tour" id="">
    Tên khách hàng: <input type="text" name="name_customer" id="">
    Email: <input type="text" name="email" id="">
    Số điện thoại: <input type="text" name="phone" id="">
    Ngày đi <input type="date" name="day" id="">
    Số người lớn(>10 tuổi) <input type="number" name="adults" id="">
    Số trẻ em (từ 5 tuổi đến 9 tuổi) <input type="number" name="children_5_9" id="">
    Số trẻ em (dưới 5 tuổi) <input type="number" name="children_0_4" id="">
    Giá tour: <input type="text" name='price' id="">
</form>
</body>
</html>
