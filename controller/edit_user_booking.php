<?php
include '../lib/function.php';
$idUser = isset($_GET['id_user']) ? $_GET['id_user'] : 0;

$customers = getCustomerTour($idUser);

foreach($customers as $key => $row){
    $nameTourValue = $row['name'];
    echo $nameTourValue;
    $nameCustomerValue = $row['name_customer'];
    $emailValue = $row['email'];
    $phoneValue = $row['phonenumber'];
    $dayValue = $row['day_go'];
    $adultsValue = $row['adults'];
    $childrenNineValue = $row['childrenNine'];
    $childrenFiveValue = $row['childrenFive'];
    $sumPriceValue = $row['sum_price'];
}


$nameTourSet = isset($_POST['name_tour']) ? $_POST['name_tour'] : '';
$nameCustomerSet = isset($_POST['name_customer']) ? $_POST['name_customer'] : '';
$emailSet = isset($_POST['email']) ? $_POST['email'] : '';
$phoneSet = isset($_POST['phone']) ? $_POST['phone'] : '';
$daySet = isset($_POST['day']) ? $_POST['day'] : '';
$adultSet = isset($_POST['adults']) ? $_POST['adults'] : '';
$childrenNineSet  = isset($_POST['children_5_9']) ? $_POST['children_5_9'] : '';
$childrenFiveSet = isset($_POST['children_0_4']) ? $_POST['children_0_4'] : '';
$sumPriceSet = isset($_POST['sum_price']) ? str_replace(',', '', $_POST['sum_price']) : '';


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
    Tour đã đặt: <input type="text" name="name_tour" id="name_tour" value="<?=$nameTourValue?>">
    Tên khách hàng: <input type="text" name="name_customer" id="name_customer" value="<?=$nameCustomerValue?>">
    Email: <input type="text" name="email" id="email" value="<?=$emailValue?>">
    Số điện thoại: <input type="text" name="phone" id="phone" value="<?=$phoneValue?>">
    Ngày đi <input type="date" name="day" id="day" value="<?=$dayValue?>">
    Số người lớn(>10 tuổi) <input type="number" name="adults" id="adults" value="<?=$adultsValue?>">
    Số trẻ em (từ 5 tuổi đến 9 tuổi) <input type="number" name="children_5_9" id="children_5_9" value="<?=$childrenNineValue?>">
    Số trẻ em (dưới 5 tuổi) <input type="number" name="children_0_4" id="" value = "<?=$childrenFiveValue?>">
    Giá tour: <input type="text" name='price' id="" value = <?=$sumPriceValue?>>
</form>
</body>
</html>
