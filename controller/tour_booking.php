<?php

include '../lib/db_connect.php';
$sql = "SELECT * FROM tbl_tour";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$idTour = $row['id'];
$price = $row['price'];

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$day = isset($_REQUEST['day']) ? $_REQUEST['day'] : '';


if ($name != '' && $phone != '' && $email != '' && $day != '') {
    $sql = "INSERT INTO tbl_rls_tour_customer (id_tour, name, phonenumber, email, price,day_go) VALUES ('$idTour', '$name', '$phone', '$email', '$price','$day')";

    if (mysqli_query($conn, $sql)) {
        echo 'Booking successfully';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
                <h2>Thông tin liên hệ</h2>
                <form>
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
                    <button type="submit">Gửi</button>
                </form>
            </section>
        </div>
    </main>
    <footer>
        <?php include '../lib/footer_home.php'; ?>
    </footer>
</section>
</body>
</html>
