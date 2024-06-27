<?php
include '../lib/function.php';
$idUser = isset($_GET['id_user']) ? (int)$_GET['id_user'] : 0; // Cast to int for security
$status = isset($status) ? $status : '';
// Prepare the SQL query
//$sql = 'SELECT tbl_rls_tour_customer.name_customer, tbl_rls_tour_customer.email, tbl_rls_tour_customer.phonenumber, tbl_rls_tour_customer.sum_price, tbl_rls_tour_customer.day_go, tbl_rls_tour_customer.status_booking, tbl_rls_tour_customer.id_tour as tour_id, tbl_tour.name, tbl_tour.id FROM tbl_rls_tour_customer INNER JOIN tbl_tour ON tbl_rls_tour_customer.id_tour = tbl_tour.id WHERE tbl_rls_tour_customer.id_user = '.$idUser.'';

$customers = getCustomerById($idUser);
foreach($customers as $key => $customer){
    $status = $customer['status_booking'];
}
mysqli_close($conn);
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="/tour/asset/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
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
                <?php if($status === 'chưa_xác_nhận' || $status = 'hủy_tour') {?>
                <th>
                    Hành động
                </th>
               <?php } ?>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $key => $row) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['name_customer']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['phonenumber']?></td>
                    <td><?php echo number_format($row['sum_price'], 0, ',', '.').  ' VNĐ' ?></td>
                    <td><?= $row['day_go']?></td>
                    <td><?= $row['status_booking']?></td>
                    <td>
                        <?php if($row['status_booking'] === 'chưa_xác_nhận' || $row['status_booking'] === 'hủy_tour' || $row['status_booking'] === "") {?>
                            <a href="../controller/edit_user_booking.php?id_user=<?=$row['id_user']?>">Edit</a><br>
                            <a href="../controller/cancel_booking.php?id=<?= $row['id']?>">Huỷ Tour</a>
                       <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
></script>
<script src="./asset/js/bootstrap.min.js"></script>
<script src="./asset/js/main.js"></script>
<script src="./asset/js/slideshow.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="/tour_php/asset/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>
</html>