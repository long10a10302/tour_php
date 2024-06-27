<?php
include '../lib/function.php';
$idUser = isset($_GET['id_user']) ? ($_GET['id_user']) : 0;
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
        <title>Travel Tour</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Roboto:ital,wght@0,500;600,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/main.css">
        <link rel="stylesheet" href="../asset/css/blog.css">
        <link rel="stylesheet" href="../asset/css/tour_detail.css">
    </head>
<body>
<section>
    <header>
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
                                    <p><?= number_format($row['price']);  ?></p>
                                    <h2>Bao gồm</h2>
                                    <p><?= $row['note']?></p>
                                    <?php if($idUser > 0 ) {?>
                                    <div class="booking-tour">
                                        <button><a href="../controller/tour_booking.php?id=<?=$row['id']?>&id_user=<?=$_GET['id_user']?>">Đặt ngay</a></button>
                                    </div>
                                    <?php } else { ?>
                                        <div class="booking-tour">
                                        <button><a href="../controller/tour_booking.php?id=<?=$row['id']?>">Đặt ngay</a></button>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="tour-sidebar">
                           
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
                                                    <?php if ($_GET['id_user'] > 0){ ?>
                                                    <div class="col-lg-6">
                                                        <h6><a href="tour_detail.php?id=<?=$row['id']?>&&id_user=<?=$_GET['id_user']?>"><?= $row['name'];?></a></h6>
                                                        <p><?= $row['time_create'];?></p>
                                                    </div>
                                                  <?php } else { ?>
                                                    <div class="col-lg-6">
                                                        <h6><a href="tour_detail.php?id=<?=$row['id']?>"><?= $row['name'];?></a></h6>
                                                        <p><?= $row['time_create'];?></p>
                                                    </div>
                                                <?php } ?>
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
    <footer>
  <?php include '../lib/footer_home.php'; ?>
</footer>
<div class="backToTop">
        <a id="button"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </div>
</section>
<?php include '../lib/login_form.php';?>
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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="../asset/js/tour.js"></script>
<script src="../asset/js/main.js"></script>
</body>

</html>