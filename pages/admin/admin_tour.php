<?php
include '../..//lib/function.php';
$tours = getAllTour();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Quan ly Tour</title>
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
</head>

<body class="sb-nav-fixed">
<!-- header -->
<?php require_once('../../lib/header_admin.php'); ?>
<!-- end header -->
<div id="layoutSidenav">
    <!-- sidebar -->
    <?php require_once('../../lib/sidebar_admin.php'); ?>
    <!-- end sidebar -->

    <div id="layoutSidenav_content">
        <!-- main -->
        <main>
            <div class="container-fluid px-4">
                <?php if (isset($_COOKIE['user_id'])) { ?>
                    <h1 class="mt-4">Quản lý Tour</h1>
                    <a href="../../controller/insert_tour.php">Insert</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Mã Tour</th>
                            <th>Tên tour</th>
                            <th>Mô tả tour</th>
                            <th>Số ngày</th>
                            <th>Giá</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tours as $key => $row) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['note'] ?></td>
                                <td><?= $row['day'] ?></td>
                                <td><?= $row['price'] ?></td>
                                <td><a href='../../controller/edit_tour.php?id=<?php echo $row["id"]; ?>'>Edit</a> | <a
                                            href='../../controller/delete_tour.php?id=<?php echo $row["id"]; ?>'>Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
               <?php
            } else {              echo '<h2>Ban can dang nhap</h2>';
             }
              ?>
            </div>
        </main>
        <!-- end main -->

        <!-- footer -->
        <?php require_once('../../lib/footer_admin.php'); ?>
        <!-- end footer -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="/tour_php/asset/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>
</html>
