<?php
include '../lib/function.php';
$tour_detail = getTourDetail($_GET['id']);
$tours = getAllTour();
$tour_latest = getTourLatest();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Detail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Roboto:ital,wght@0,500;600,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/home.css">
    <link rel="stylesheet" href="../asset/css/main.css">
    <link rel="stylesheet" href="../asset/css/blog.css">
    <link rel="stylesheet" href="../asset/css/tour.css">
    <link rel="stylesheet" href="../asset/css/tour_detail.css">
</head>

<body>
<section>
    <header>
        <?php include '../lib/header_home.php'; ?>
    </header>
    <main>
        <section class="section-hero">
            <?php include '../lib/navbar_home.php'; ?>
        </section>
        <section class="section-wrapper">
            <div class="container">
                <div class="header-blog">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-blog-left">
                                <span>Trang chủ - Tour - Chi tiết tour</span><br>
                                <h3>Chi tiết tour</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php foreach ($tour_detail as $key => $row){?>
                            <div class="tour-detail-header">
                                <h1><?= $row['name']; ?></h1>
                                <div class="tour-detail-image">
                                    <img src="<?= $row['name_file'];?>" alt="Tour Image">
                                </div>
                                <div class="tour-detail-info">
                                    <h2>Thời gian</h2>
                                    <p><?= $row['day']; ?></p>
                                    <h2>Điểm nổi bật</h2>
                                    <p><?= $row['description'];?></p>
                                    <h2>Lịch trình</h2>
                                    <p><?= $row['plan_tour'];?></p>
                                    <h2>Giá tour</h2>
                                    <p><?= $row['price'];?></p>
                                    <h2>Bao gồm</h2>
                                    <p><?= $row['note']?></p>
                                    <div class="booking-tour">
                                        <button><a href="../controller/tour_booking.php?id=<?=$row['id']?>">Đặt ngay</a></button>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="tour-sidebar">
                            <div class="tour-search">
                                <h3>Tìm tour</h3>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Điểm đến">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="tourDuration">
                                            <option>Thời gian</option>
                                            <option>1 ngày</option>
                                            <option>2 ngày 1 đêm</option>
                                            <option>3 ngày 2 đêm</option>
                                            <option>4 ngày 3 đêm</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Ngày khởi hành">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </form>
                            </div>
                            <div class="sidebar-ad">
                                <a href="#"><img src="./img/ad.jpg" alt=""></a>
                            </div>
                            <div class="recent-post">
                                <h4>Các tour gần đây</h4>
                                <div class="row">
                                    <?php foreach ($tour_latest as $key => $row){?>
                                        <div class="col-lg-12">
                                            <div class="post-item">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <img src="<?= $row['name_file'];?>" alt="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6><a href=""><?= $row['name'];?></a></h6>
                                                        <p><?= $row['time_create'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="sidebar-contact">
                                <h3>Liên hệ</h3>
                                <p>Hotline: 0123 456 789</p>
                                <p>Email: support@mytour.vn</p>
                                <p>Địa chỉ: 123 Đường ABC, Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</section>
<footer>
    <div class="container">
        <div class="logo">
            <img src="https://storage.googleapis.com/tripi-assets/mytour/icons/icon_logo_mytour.svg" alt="">
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-content">
                    <div>
                        <h4>Liên hệ với chúng tôi</h4>
                        <ul>
                            <li>25 Láng Hạ Thanh Xuân Hà Nội</li>
                            <li>0338095474</li>
                            <li>long10a11999@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-content">
                    <div>

                    </div>
                    <div>
                        <h4>Chính sách và quy định</h4>
                        <ul>
                            <li><a href="#">Điều khoản và điều kiện</a></li>
                            <li><a href="#">Chính sách về hủy đặt phòng và hoàn trả tiền</a></li>
                            <li><a href="#">Điều lệ bay quốc nội</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-content">
                    <h4>Khách hàng và đối tác</h4>
                    <ul>
                        <li><a href="#">Đăng nhập HMS</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>