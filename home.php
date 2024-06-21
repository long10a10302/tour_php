<?php
include './lib/function.php';
$tours = getAllHotTour();
$blogs = getHotBlog();

$sql = "SELECT * FROM tbl_user";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$id_user = $row['id_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Travel Tour</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./asset/css/main.css"/>
    <link rel="stylesheet" href="./asset/css/tour.css"/>
    <link rel="stylesheet" href="./asset/css/home.css"/>
</head>
<body>
<section>
    <header>
    </header>
    <main>
        <div class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="./home.php">
                        <img src="https://storage.googleapis.com/tripi-assets/mytour/icons/icon_logo_mytour.svg" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./home.php">Trang chủ <span
                                            class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="./pages/tour.php" id="navbarDropdown">
                                    Tour
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="./pages/blog.php" id="navbarDropdown">
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="./pages/assement.php" id="navbarDropdown"
                                   role="button"
                                   data-toggle="dropdown" aria-expanded="false">
                                    Đánh giá
                                </a>
                            </li>
                        </ul>
                        <ul class="list-authentiation">
                            <li>
                                <span id="login">
                                    <i class="fa fa-user-o" aria-hidden="true"></i> Đăng Nhập
                                </span>
                            </li>
                            <li>
                                <span id="signup">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Đăng Ký
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?php include './lib/banner.php'; ?>
        <section class="section-search">
            <div class="container">
                <form action="./pages/search_tour.php">
                    <div class="row">
                        <div class="col-lg-10 form-group">
                            <select name="" id="">
                                <option value="">Từ Hà Nội</option>
                                <option value="">Từ Hồ Ch Minh</option>
                            </select>
                            <i></i>
                            <input type="text" name="search" id="">
                        </div>
                        <div class="col-lg-2 form-group">
                            <input type="submit" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="section-tour">
            <div class="tour-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-12">
                            <div class="header-left">
                                <span>Tour</span>
                                <span>Mới</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tour-item">
                <div class="container">
                    <div class="row">
                        <?php foreach ($tours as $key => $row) { ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="filterDiv <?= ($row['status'] === 'tour_nước_ngoài') ? 'out-country' : 'in-country'; ?>">
                                    <div class="list-tour">
                                        <div class="slider-img">
                                            <div>
                                                <img src="<?= $row['name_file'] ?> " alt=""/>
                                            </div>
                                        </div>
                                        <div class="title-tour">
                                            <a href="./pages/tour_detail.php?id=<?= $row['id']; ?>">
                                                <h6><?= $row['name'] ?></h6>
                                            </a>
                                        </div>
                                        <div class="day-tour">
                                            <span> <?= $row['day'] ?> </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="prices">
                                                    <span>Từ</span>
                                                    <span><?= number_format($row['price']); ?><span>đ</span></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="booking-tour">
                                                    <span><a href='./controller/tour_booking.php?id=<?= $row['id']; ?>'>Đặt ngay</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-news">
            <div class="header-news">
                <div class="container">
                    <div class="header-left">
                        <span>Cảm hứng </span>
                        <span>cho những chuyến đi</span>
                    </div>
                </div>
            </div>
            <div class="news-list">
                <div class="container">
                    <div class="row">
                        <?php foreach ($blogs as $key => $row) { ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="news-content">
                                    <img src="<?= $row['name_file']; ?>" alt=""/>
                                    <h4>
                                        <a href="./pages/blog_detail.php?id=<?= $row['id']; ?>"><?= $row['title']; ?></a>
                                    </h4>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-tour">
            <div class="header-news">
                <div class="container">
                    <div class="header-left">
                        <span>Đối tác </span>
                        <span>Của chúng tôi</span>
                    </div>
                </div>
            </div>
            <div class="list-partner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <img src="https://idodesign.vn/wp-content/uploads/2023/08/logo-cong-ty-du-lich-5.jpg"
                                 alt=""/>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img src="https://banoca.com/wp-content/uploads/2021/03/cach-thiet-ke-logo-du-lich.jpg"
                                 alt=""/>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img src="https://rubicmarketing.com/wp-content/uploads/2022/09/y-nghia-logo-du-lich-1.jpg"
                                 alt=""/>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img src="https://solution.com.vn/upload_images/images/2021/11/logo-du-lich/Logo-du-lich-The-Sun-Travel.jpg"
                                 alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php include './lib/footer_home.php'; ?>
    </footer>
    <div class="backToTop">
        <a id="button"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </div>
</section>
<div id="id01" class="modalLogin">
    <form class="modal-content animate" action="" method="post" id="loginForm">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="./img/avatar.png" alt="Avatar" class="avatar"/>
        </div>
        <div class="container">
            <div>
                <label for="uname"><b>Tên Đăng Nhập</b></label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="username" id="username"
                       value="<?php if (isset($_COOKIE['password'])) {
                           echo $_COOKIE['username'];
                       } ?>" required/>
                <span id='messageU'></span>
            </div>
            <div>
                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" id="password" name="password"
                       value="<?php if (isset($_COOKIE['password'])) {
                           echo $_COOKIE['password'];
                       } ?>" required/>
                <span id='messageP'></span>
            </div>
            <button type="button" class="loginBtn" onclick="loginLoad()">Đăng Nhập</button>
            <div class="row">
                <div class="col-lg-6">
                    <input type="checkbox" id='rememberPass'/>
                    <label for="">Nhớ mật khẩu</label>
                </div>
                <div class="col-lg-6">
                    <div style="display: flex; justify-content: flex-end">
                        <label for="">Quên mật khẩu</label>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="id_user" name="id_user" value="<?= $id_user; ?>">
    </form>
</div>
<div id="id02" class="modalSignup">
    <span onclick="document.getElementById('id02').style.display='none'" class="close"
          title="Close Modal">&times;</span>
    <form class="modal-content animate" action="./controller/register.php" id="registration" method="POST">
        <div class="container">
            <h1>Form Đăng ký</h1>
            <p>Điền vào form để đăng ký tài khoản .</p>
            <hr>
            <div>
                <label for="psw"><b>Họ tên khách hàng/b></label>
                <input type="text" placeholder="Nhập họ tên" name="name" required>
            </div>
            <div>
                <label for="uname"><b>Tên Đăng Nhập</b></label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="uname" required>
            </div>

            <div>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Nhập  Email" name="email" required>
            </div>
            <div>
                <label for="email"><b>Số điện thoại</b></label>
                <input type="text" placeholder="Nhập  Số điện thoại" name="phone" required>
            </div>
            <div>
                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="psw" required>
            </div>

            <div>
                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Nhập lại mật khẩu" name="psw_repeat" required>
            </div>

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
            <div class="clearfix">
                <button type="submit" class="loginBtn">Đăng ký</button>
            </div>
        </div>
    </form>
</div>
<script>
    function loginLoad() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            var idUser = document.getElementById('id_user').value;
            var response = this.responseText.trim();
            if (response == 'login_success') {
                window.location.href = "/tour_php/pages/home_user.php?id_user=" + idUser;
            } else if (response === 'password_fail') {
                document.getElementById('messageP').innerHTML = "wrong_pass";
            } else {
                document.getElementById('messageU').innerHTML = "wrong_user";
            }
        }

        var userName = document.getElementById('username').value;
        var passWord = document.getElementById('password').value;

        var checkRemember = document.getElementById('rememberPass');
        var rememberPass = checkRemember.checked ? 'pass' : 'fail';

        xhttp.open("GET", "./controller/login_home.php?username=" + userName + "&password=" + passWord + "&rememberPass=" + rememberPass, true);
        xhttp.send();
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="./asset/js/bootstrap.min.js"></script>
<script src="./asset/js/main.js"></script>
<script src="./asset/js/slideshow.js"></script>
<script>
    <script>
        document.getElementById("registration").addEventListener("submit", function(event) {
        var password = document.getElementById("psw").value;
        var confirmPassword = document.getElementById("psw_repeat").value;

        if (password !== confirmPassword) {
        alert("Nhập lại mật khẩu không khớp");
        event.preventDefault(); // Prevent form submission
        return false;
    }

        // Optionally, you can add more validation for other fields like email format

        // Validation passed, allow form to submit
        return true;
    });
</script>

</script>
</body>
</html>
