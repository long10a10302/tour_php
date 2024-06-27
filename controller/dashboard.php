<?php
include '../../lib/function.php';
$totalRevenues =  totalRevenue();
$totalRevenue = $totalRevenues[0]['totalRevenue'];

$countCustomers = countCustomer();
$countCustomer = $countCustomers[0]['sumCustomer'];

$totalRevenuesMonth = totalRevenueMonth();
if (!empty($totalRevenuesMonth)) {
    $totalRevenueMonth = $totalRevenuesMonth[0]['total_revenue'];
} else {
    $totalRevenueMonth = 0; // or handle the case in a different way
}

$totalRevenuesYear = totalRevenueYear();
if (!empty($totalRevenuesYear)) {
    $totalRevenueYear = $totalRevenuesYear[0]['total_revenue'];
} else {
    $totalRevenueYear = 0; // or handle the case in a different way
}

// Lấy dữ liệu từ cơ sở dữ liệu



?>