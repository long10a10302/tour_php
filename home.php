<?php include './lib/function.php';
$tours = getAllHotTour();
$blogs = getHotBlog();
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
    <style>
        .day-tour,
        .title-tour{
            height: 50px;
            width: 100%;
        }
    </style>
</head>
<body>
<section>
    <header><?php include './lib/header_home.php'; ?>
    </header>
    <main>
        <div class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="./home.php"> <img
                                src="https://storage.googleapis.com/tripi-assets/mytour/icons/icon_logo_mytour.svg" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./home.php">Trang chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link dropdown-toggle" href="./pages/tour.php" id="navbarDropdown">
                                    Tour
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link dropdown-toggle" href="./pages/blog.php" id="navbarDropdown">
                                    Blog
                                </a>

                            </li>
                        </ul>
                        <ul class="list-authentiation">
                            <li>
                                        <span id="login">
                                <i class="fa fa-user-o" aria-hidden="true"></i> Đăng Nhập
                                </span>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?php include './lib/banner.php'; ?>
        <section class="section-tour">
            <div class="tour-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="header-left">
                                <span>Tour</span>
                                <span>Đang hot</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tour-item">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($tours as $key => $row) {
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="filterDiv in-country">
                                    <div class="list-tour">
                                        <div class="slider-img">
                                            <div>
                                                <img src="<?= $row['name_file'] ?> " alt=""/>
                                            </div>
                                        </div>
                                        <div class="title-tour">
                                            <a href="./pages/tour_detail.php?id=<?= $row['id'];?>">
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
                                                    <span><?= $row['price'] ?><span>đ</span></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="booking-tour">
                                                    <span><a href='./controller/tour_booking.php?id=<?=$row['id'];?>'>Đặt ngay</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
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
                                        <a href="./pages/blog_detail.php?id=<?=$row['id'];?>"
                                        ><?= $row['title']; ?>
                                        </a>
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
                            <img src="http://127.0.0.1:5500/img/1.png" alt=""/>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img src="http://127.0.0.1:5500/img/2.png" alt=""/>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img src="http://127.0.0.1:5500/img/3.png" alt=""/>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <img src="http://127.0.0.1:5500/img/4.png" alt=""/>
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
<?php include './lib/login_form.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
></script>
<script src="./asset/js/bootstrap.min.js"></script>
<script src="./asset/js/main.js"></script>
<script src="./asset/js/slideshow.js"></script>
<script>
    $(function() {
        $("#day-go").datepicker();
        $('#day-out').datepicker();
        $('#day-come').datepicker();
        $('#day-return').datepicker();
    });
</script>
</body>
</html>
