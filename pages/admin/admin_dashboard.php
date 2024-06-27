<?php

include '../../controller/dashboard.php';
include '../../lib/db_connect.php';
$dataMonth = array();
$dataDate = array();
// Lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT 
    DATE_FORMAT(booking_date, '%Y-%m') AS month, 
    SUM(sum_price) AS total_revenue
FROM tbl_rls_tour_customer  WHERE status_booking = 'đã hoàn thành'
GROUP BY month
ORDER BY month";
$result = $conn->query($sql);

// Lưu dữ liệu vào mảng $data
while ($row = $result->fetch_assoc()) {
    $dataMonth[$row['month']] = $row['total_revenue'];
}

$query = "SELECT 
    DATE(booking_date) AS booking_date, 
    SUM(sum_price) AS total_revenue
FROM tbl_rls_tour_customer  WHERE status_booking = 'đã hoàn thành'
GROUP BY booking_date
ORDER BY booking_date";
$result = $conn->query($query);

// Lưu dữ liệu vào mảng $data
while ($row = $result->fetch_assoc()) {
    $dataDate[$row['booking_date']] = $row['total_revenue'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../asset/css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php require_once('../../lib/header_admin.php'); ?>

<div id="layoutSidenav">
    <?php require_once('../../lib/sidebar_admin.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"> Tổng Doanh thu </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p><?=$totalRevenue?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Số lượng khách đặt tour</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p><?=$countCustomer?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Doanh thu theo tháng hiện tại</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p><?=$totalRevenueMonth?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Doanh thu theo năm hiện tại</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p><?=$totalRevenueYear?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                               Doanh thu theo tháng
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                               Doanh thu theo ngày
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        var ctx = document.getElementById('myAreaChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo implode(', ', array_map(function($item) {
                    return "'" . $item . "'";
                }, array_keys($dataMonth))); ?>],
                datasets: [{
                    label: 'Doanh thu',
                    data: [<?php echo implode(', ', array_values($dataMonth)); ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo implode(', ', array_map(function($item) {
                    return "'" . $item . "'";
                }, array_keys($dataDate))); ?>],
                datasets: [{
                    label: 'Doanh thu',
                    data: [<?php echo implode(', ', array_values($dataDate)); ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
