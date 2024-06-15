<?php

include '../lib/function.php';


// Kiểm tra và lấy ID từ URL
$id = isset($_GET['id']) ? $_GET['id'] : '';



// Lấy thông tin tour từ cơ sở dữ liệu
$tours = getTour($id);

// Lấy thông tin tour
foreach ($tours as $key => $row) {
    $idTour = $row['id'];
    $price = floatval($row['price']);
    $tourName = $row['name']; // Giả sử bảng tour có cột 'name'
}

// Lấy thông tin từ form
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$day = isset($_REQUEST['day']) ? $_REQUEST['day'] : '';
$numberPeople = isset($_REQUEST['number_people']) ? floatval($_REQUEST['number_people']) : 0;
$numberChildren = isset($_REQUEST['number_children']) ? floatval($_REQUEST['number_children']) : 0;
$sumPrice = isset($_REQUEST['sum_price']) ? floatval($_REQUEST['sum_price']) : 0;

// Kiểm tra các trường cần thiết trước khi chèn vào cơ sở dữ liệu
if ($name != '' && $phone != '' && $email != '' && $day != '') {
    $sql = "INSERT INTO tbl_rls_tour_customer (id_tour, name, phonenumber, email, day_go, number_people, number_children, sum_price)
            VALUES ('$idTour', '$name', '$phone', '$email', '$day', '$numberPeople', '$numberChildren', '$sumPrice')";
    if (mysqli_query($conn, $sql)) {
        echo 'Đặt tour thành công';
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Vui lòng điền đầy đủ thông tin.";
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
    <link rel="stylesheet" href="/tour_php/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="/tour_php/asset/css/main.css">
    <link rel="stylesheet" href="/tour_php/asset/css/tour.css">
    <link rel="stylesheet" href="/tour_php/asset/css/home.css">
    <link rel="stylesheet" href="/tour_php/asset/css/booking.css">

</head>
<body>
<section>
    <main>
        <?php include '../lib/navbar_home.php'; ?>
        <div class="container">
            <section class="contact-info">
                <h2>Đơn đặt hàng Tour <?= $row['name']; ?></h2>
                <form id="registrationForm" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="day">Ngày đi:</label>
                        <input type="date" id="day" name="day" required>
                    </div>
                    <input type="hidden" name="price_tour" id = "price_tour" value = <?= $row['price'] ;?>>
                    <div class="form-group">
                        <label for="adults">Số lượng người lớn (>10 tuổi):</label>
                        <input type="number" id="adults" name="adults" min="1" required onchange="calculateTotalPrice() ">
                    </div>
                    <div class="form-group">
                        <label for="children_5_9">Số lượng trẻ em (từ 5 - 9 tuổi):</label>
                        <input type="number" id="children_5_9" name="children_5_9" min="0" required onchange="calculateTotalPrice() ">
                    </div>
                    <div class="form-group">
                        <label for="children_0_4">Số lượng trẻ em (dưới 5 tuổi):</label>
                        <input type="number" id="children_0_4" name="children_0_4" min="0" required onchange="calculateTotalPrice() ">
                    </div>
                    <div class="form-group">
                        <label for="children_0_4">Thành tiền</label>
                        <input type="text" id="sum_price" name="sum_price" min="0" required onchange="calculateTotalPrice() ">
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
        const numAdult = parseInt(document.getElementById('adults').value) || 0;
        const numChildNine = parseInt(document.getElementById('children_5_9').value) || 0;
        const numChildFive = parseInt(document.getElementById('children_0_4').value) || 0;
        const priceTour = parseInt(document.getElementById('price_tour').value) || 0;

        const totalPrice = numAdult * priceTour + numChildNine * 0.5 * priceTour; // Đổi 50/100 thành 0.5
        const formattedPrice = totalPrice.toLocaleString('vi-VN');
        document.getElementById('sum_price').value = formattedPrice // Assign numerical value directly

// When displaying totalPrice, format it as a string and set the innerText property of the display_price element

        const displayPriceElement = document.getElementById('display_price');
        if (displayPriceElement) {
            displayPriceElement.innerText = formattedPrice;
        }
    }

    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var day = document.getElementById('day').value;
        var adults = document.getElementById('adults').value;
        var children_5_9 = document.getElementById('children_5_9').value;
        var children_0_4 = document.getElementById('children_0_4').value;

        if (name.trim() === "" || email.trim() === "" || phone.trim() === "" || day.trim() === "" || adults < 1) {
            alert("Vui lòng điền đầy đủ thông tin và số lượng người lớn.");
            return false;
        }

        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            alert("Vui lòng nhập email hợp lệ.");
            return false;
        }

        if (!/^\d{10,11}$/.test(phone)) {
            alert("Vui lòng nhập số điện thoại hợp lệ.");
            return false;
        }

        var currentDate = new Date();
        var selectedDate = new Date(day);
        if (selectedDate < currentDate) {
            alert("Ngày đi phải là ngày trong tương lai.");
            return false;
        }

        return true;
    }


</script>


</body>
</html>