
<!DOCTYPE html>
<html>
<head>
    <title>Doanh thu theo tháng</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo implode(', ', array_map(function($item) {
                    return "'" . $item . "'";
                }, array_keys($data))); ?>],
                datasets: [{
                    label: 'Doanh thu',
                    data: [<?php echo implode(', ', array_values($data)); ?>],
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