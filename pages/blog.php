<?php
include '../lib/function.php';
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page-1)*$item_per_page;
$blogs =  getAllBlog();
$blogs_time = getBlogLatest();
$totalRecords = mysqli_query($conn,'SELECT * FROM tbl_blog');
$totalRecords = $totalRecords->num_rows;
$totalPages= ceil($totalRecords/$item_per_page);
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
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../asset/css/main.css"/>
    <link rel="stylesheet" href="../asset/css/tour.css"/>
    <link rel="stylesheet" href="../asset/css/home.css"/>

</head>
<body>
<section>
    <header>
        <?php include '../lib/navbar_home.php'; ?>
    </header>
    <main>
        <section class="section-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="header-blog">
                            <span>Trang chủ - Bài viết</span>
                            <h3>Bài viết</h3>
                        </div>
                        <div class="search-blog">
                            <form action="">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="categories-blog">
                            <h4>Danh mục</h4>
                            <div class="categories-item">
                                <a href="../home.php">
                                    <p>Tour du lịch</p>
                                </a>
                                <a href="blog.php">
                                    <p>Tin tức du lịch</p>
                                </a>
                            </div>
                        </div>
                        <div class="recent-post">
                            <h4>Bài viết gần đây</h4>
                            <div class="row">
                                <?php foreach ($blogs_time as $key => $row) { ?>
                                <div class="col-lg-12">
                                    <div class="post-item">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="<?=$row['name_file']?>" alt="">
                                            </div>
                                            <div class="col-lg-6">
                                                <h6><?=$row['title']?></h6>
                                                <p><?=$row['time_create']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-8">
                        <div>
                            <div class="row">
                                <?php
                                foreach ($blogs as $key => $row) {
                                    ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="news-content">
                                            <img src="<?= $row['name_file'] ?>" alt=""/>
                                            <h4>
                                                <a href="blog_detail.php?id=<?=$row['blog_id'];?>">
                                                    <?= $row['title']; ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php include '../controller/pagidate.php';?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php include '../lib/footer_home.php'; ?>
    </footer>
</section>

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