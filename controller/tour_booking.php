<?php

include '../lib/function.php';
$id = $_GET['id'];

$tours = getTour($id);

foreach ($tours as $key => $row){
    $idTour = $row['id'];
    $price = floatval($row['price']);
}
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$day = isset($_REQUEST['day']) ? $_REQUEST['day'] : '';
$numberPeople = isset($_REQUEST['number_people']) ? floatval($_REQUEST['number_people'] ): 0;
$numberChildren = isset($_REQUEST['number_children']) ? floatval($_REQUEST['number_children']) :0;
$$sumPrice = isset($_REQUEST['sum_price']) ? floatval($_REQUEST['sum_price']) :0;

if ($name != '' && $phone != '' && $email != '' && $day != '') {
    $sql = "INSERT INTO tbl_rls_tour_customer (id_tour, name, phonenumber, email,day_go, number_people, number_children,sum_price)VALUES ('$idTour', '$name','$phone', '$email','$day','$numberPeople','$numberChildren','$sumPrice');";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Tour</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/tour/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="/tour/asset/css/main.css">
    <link rel="stylesheet" href="/tour/asset/css/tour.css">
    <link rel="stylesheet" href="/tour/asset/css/home.css">
    <link rel="stylesheet" href="/tour/asset/css/booking.css">

</head>
<body>
<section>
    <header><?php include '../lib/header_home.php'; ?></header>
    <main>
        <?php include '../lib/navbar_home.php'; ?>
        <div class="container">
            <section class="contact-info">
                <h2>Đơn đặt hàng  Tour <?=$row['name'];?></h2>
                <form>
                    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" require/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Nhập email của bạn" require/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <div class="phone-input">
                            <select id="country-code">
                                <option value="+84">+84</option>
                            </select>
                            <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" require/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="day">Ngày đi</label>
                        <input type="date" id="email" name="day" placeholder="Nhập ngày đi " require/>
                    </div>
                    <input type="hidden" name="price_tour" value = <?= $row['price'] ?> id = 'price_tour'>
                    <div class="form-group">
                        <label for="">Số lượng người lớn(>10 tuổi)</label>
                        <input type="number" name="number_people" id="people" onchange="calculateTotalPrice()">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng trẻ em (từ 5 đến 9 tuổi) </label>
                        <input type="number" name="number_people" id="age_nine" onchange="calculateTotalPrice()">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng trẻ em (<5 tuổi)</label>
                        <input type="number" name="number_children" id="age_five" onchange="calculateTotalPrice()">
                    </div>
                    <div class="form-group">
                        <label for="">Tổng tiền</label>
                        <input type="number" name="sum_price" id="sum_price" onchange="calculateTotalPrice()">
                    </div>
                    <button type="submit">Đăng ký</button>
                </form>
            </section>
        </div>
    </main>
    <footer>
        <?php include '../lib/footer_home.php'; ?>
    </footer>
</section>
<script>
    function calculateTotalPrice() {
        const numAdult = parseInt(document.getElementById('people').value) || 0;
        const numChildNine = parseInt(document.getElementById('age_nine').value) || 0;
        const numChildFive = parseInt(document.getElementById('age_five').value) || 0;
        const priceTour = parseInt(document.getElementById('price_tour').value) || 0;

        const totalPrice = numAdult * priceTour + numChildNine*50/100;
        document.getElementById('sum_price').value = totalPrice;
    }
</script>
</body>
</html>
