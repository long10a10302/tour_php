<?php 
$idUser = isset($_GET['id_user']) ? ($_GET['id_user']) : 0;
?>
<?php if($idUser > 0) { ?>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="..//home.php"> <img
                        src="https://storage.googleapis.com/tripi-assets/mytour/icons/icon_logo_mytour.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>   

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/home_user.php?id_user=<?=$_GET['id_user']?>">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="../pages/tour.php?id_user=<?=$_GET['id_user']?>" 
                           >
                            Tour
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="../pages/blog.php?id_user=<?=$_GET['id_user']?>" 
                           >
                            Blog
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="../pages/assement.php?id_user=<?=$_GET['id_user']?>" 
                           >
                            Đánh giá
                        </a>
                    </li>
                    <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="../pages/user_booking.php?id_user=<?=$_GET['id_user']?>" 
                                  >
                                   Xem Tour đã đặt
                                </a>
                            </li>
                </ul>
                </div>
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
              
                <li><a class="dropdown-item" href="../controller/logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>   
            </div>
        </div>
    </nav>
</div>
<?php } else { ?>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="..//home.php"> <img
                        src="https://storage.googleapis.com/tripi-assets/mytour/icons/icon_logo_mytour.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>   

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="../pages/tour.php" 
                           >
                            Tour
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="../pages/blog.php" 
                           >
                            Blog
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="../pages/assement.php" 
                           >
                            Đánh giá
                        </a>
                    </li>

                </ul>
                </div>
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
        </li>
    </ul>   
            </div>
        </div>
    </nav>
</div>
<?php } ?>