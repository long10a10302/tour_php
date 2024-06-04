<?php
include '../lib/function.php';

$blogs =  getAllBlog();
$blogs_time = getBlogLatest();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Travel Tour</title>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link
                href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
                rel="stylesheet"
        />
        <link
                rel="stylesheet"
                href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"
        />
        <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link rel="stylesheet" href="/tour_php/asset/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/tour_php/asset/css/main.css"/>
        <link rel="stylesheet" href="/tour_php/asset/css/tour.css"/>
        <link rel="stylesheet" href="/tour_php/asset/css/blog.css"/>
    </head>
</head>
<body>
<section>
    <header>
        <?php include '../lib/header_home.php'; ?>
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
                        <div class="pagination-blog">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="previous-link">
                                        <button><a href="#">Previous</a></button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="link-item">
                                        <button>
                                            <a href="">1</a>
                                        </button>
                                        <button>
                                            <a href="">2</a>
                                        </button>
                                        <button>
                                            <a href="">3</a>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="next-link">
                                        <button><a href="">Next</a></button>
                                    </div>
                                </div>
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
</section>
</body>
</html>