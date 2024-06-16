<?php
include '../lib/function.php';
$idUser = isset($_GET['id_user']) ? $_GET['id_user'] : 0;

$customers = getCustomerById($idUser);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"><?php
    ?>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Travel Tour</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../asset/css/main.css"/>
    <link rel="stylesheet" href="../asset/css/tour.css"/>
    <link rel="stylesheet" href="../asset/css/home.css"/>
</head>
<body>
<header>
    <?php include '../lib/navbar_home.php'; ?>
</header>
<main>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Tên tour đã đặt</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Giá</th>
                <th>Ngày đi</th>
                <th>Trạng thái đặt tour</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $key => $row) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['name_customer']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['phonenumber']?></td>
                    <td><?= $row['sum_price']?></td>
                    <td><?= $row['day_go']?></td>
                    <td><?= $row['status_booking']?></td>
                    <td>
                        <a href=""></a><a href=""></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>