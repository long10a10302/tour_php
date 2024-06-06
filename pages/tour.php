<?php
include '../lib/function.php';
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page-1)*$item_per_page;
$tours = getAllTourLimit($item_per_page,$offset);
$totalRecords = mysqli_query($conn,'SELECT * FROM tbl_tour');
$totalRecords = $totalRecords->num_rows;
$totalPages= ceil($totalRecords/$item_per_page);
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
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/main.css">
    <link rel="stylesheet" href="../asset/css/blog.css">
    <link rel="stylesheet" href="../asset/css/tour.css">
</head>

<body>
<section>
    <header>
       <?php include '../lib/header_home.php'; ?>
        <?php include '../lib/navbar_home.php';?>
    </header>
    <main>
        <section class="section-wrapper">
            <div class="container">
                <div class="header-blog">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-blog-left">
                                <span>Trang chủ - Tour - Các tour</span><br>
                                <h3>Tour</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-blog-right">
                                <a id="grid"><i class="fa fa-windows " aria-hidden="true"></i></a>
                                <a id="list"><i class="fa fa-list active_display" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="tour-item">
                            <div class="container">
                                <div class="row ">
                                    <?php foreach ($tours as $key => $row){?>
                                    <div class=" col-lg-6 col-md list-group">
                                        <div class="">
                                            <div class="list-tour">
                                                <div class="slider-img">
                                                    <div>
                                                        <img src="<?= $row['name_file'];?>" alt="">
                                                    </div>
                                                </div>
                                                <a href="../pages/tour_detail.php?id=<?=$row['id'];?>">
                                                    <h5><?= $row['name']; ?></h5>
                                                </a>
                                                <span><?= $row['day']; ?> </span>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8">
                                                        <div class="prices">
                                                            <span>Từ</span>
                                                            <span><?= $row['price']; ?><span>đ</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="booking-tour">
                                                            <span><a href="../controller/tour_booking.php">Đặt ngay</a></span>
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
                      <?php include '../controller/pagidate.php';?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="search-blog ">
                            <form action="">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
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
                        <div class="photo-blog">
                            <h4>Ảnh</h4>
                            <div class="row">
                                <div class="col-lg-4 col-md-6"><img src="../asset/img/1.jpg" alt=""></div>
                                <div class="col-lg-4 col-md-6"><img src="../asset/img/2.jpg" alt=""></div>
                                <div class="col-lg-4 col-md-6"><img src="../asset/img/3.jpg" alt=""></div>
                                <div class="col-lg-4 col-md-6"><img src="../asset/img/4.jpg" alt=""></div>
                                <div class="col-lg-4 col-md-6"><img src="../asset/img/5.jpg" alt=""></div>
                                <div class="col-lg-4 col-md-6"><img src="../asset/img/6.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer>
       <?php include '../lib/footer_home.php'?>
    </footer>
    <div class="backToTop">
        <a id="button"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </div>
</section>
<?php include '../lib/login_form.php';?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="../asset/js/tour.js"></script>
<script src="../asset/js/main.js"></script>

</body>

</html>