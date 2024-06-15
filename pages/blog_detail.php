<?php

include '../lib/function.php';
$blog_detail = getBlogDetail($_GET['id']);
$blogs_latest = getBlogLatest();
$blog_hot = getHotBlog();
$id = $_GET['id'];
// Kiểm tra và cập nhật lượt xem
// Cập nhật lượt xem trong cơ sở dữ liệu

$sql = "UPDATE tbl_blog SET count = count + 1  WHERE id = $id";

mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Travel Tour</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../asset/css/main.css"/>
    <link rel="stylesheet" href="../asset/css/tour.css"/>
    <link rel="stylesheet" href="../asset/css/blog.css"/>
    <link rel="stylesheet" href="../asset/css/blog_detail.css"/>
</head>
<body>
<section>
    <header>
        <?php include '../lib/navbar_home.php'; ?>
    </header>
    <main>
        <section class="section-wrapper">
            <div class="container">
                <div class="header-blog">
                    <span>Trang chủ - Bài viết - Chi tiết bài viết</span>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php
                        foreach ($blog_detail as $key => $row) {

                            ?>
                            <div class="blog-content">
                                <img src="<?= $row['name_file']; ?>" alt="">
                                <h4><?= $row['title']; ?></h4>
                                <div class="sub-content">
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i><?= $row['time_create']; ?> </span>
                                    <span><i class="fa fa-eye" aria-hidden="true"></i><?= $row['count']; ?></span>
                                    <span><button id="like"/><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i> Thích <span
                                                id='count'><?= $row['count_like']; ?></span></button></span>
                                    <span><a href="">Chia sẻ</a></span>
                                </div>
                                <p><?= $row['content']?></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Ảnh sưu tầm</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="btn-control">
                            <div>
                                <button><i class="fa fa-long-arrow-left"></i> Bài trước</button>
                            </div>
                            <div>
                                <button>Bài sau <i class="fa fa-long-arrow-right"></i></button>
                            </div>
                        </div>
                        <div class="section-news">
                            <div class="row">
                                <?php foreach ($blog_hot as $key => $row) { ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="news-content">
                                            <img src="<?= $row['name_file']; ?>" alt="">
                                            <h4>
                                                <a href="blog_detail.php?id=<?= $row['id']; ?>"><?= $row['title']; ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="reviews">
                            <h3>Đánh giá của bạn</h3>
                            <form action="../controller/insert_assement.php" id="formReview">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Họ tên bạn" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Số điện thoại" name="phonenumber">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Website" name="web">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <input type="hidden" name="id" id='id_blog' value="<?= $_GET['id']; ?>">
                                </div>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="search-blog">
                            <form action="">
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="categories-blog">
                            <h4>Danh mục</h4>
                            <div class="categories-item">
                                <a href="#">
                                    <p>Tour du lịch hot</p>
                                </a>
                                <a href="#">
                                    <p>Địa điểm thịnh hành</p>
                                </a>
                                <a href="#">
                                    <p>Tin tức du lịch</p>
                                </a>
                            </div>
                        </div>
                        <div class="recent-post">
                            <h4>Bài viết gần đây</h4>
                            <div class="row">
                                <?php foreach ($blogs_latest as $blog) { ?>
                                    <div class="col-lg-12">
                                        <div class="post-item">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <img src="<?= $blog['name_file'] ?>" alt="">
                                                </div>
                                                <div class="col-lg-6">
                                                    <h6><?= $blog['title'] ?></h6>
                                                    <p><?= $blog['time_create'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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
<script>

    var button = document.getElementById('like');
    var count = document.getElementById('count');
    var idBlog = document.getElementById('id_blog').value;
    let clickCount = count.innerHTML;
    // Gắn sự kiện click vào nút
    button.addEventListener('click', function () {
        // Tăng biến đếm lên 1
        clickCount++;


        // Hiển thị số lần bấm
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../controller/countLike.php?countClick=" + clickCount + '&&id=' + idBlog);
        xhttp.send();
    });
</script>
</body>
</html>