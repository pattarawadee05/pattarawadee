<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปยอดขาย - ภัทรวดี ขามประโคน (การ์ตูน)</title>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body { 
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); 
            font-family: 'Sarabun', sans-serif;
            min-height: 100vh;
            padding-bottom: 50px;
        }
        .header-section {
            background-color: #ffffff;
            border-bottom: 5px solid #ffdde1;
            padding: 30px 0;
            margin-bottom: 40px;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 30px rgba(255, 157, 157, 0.1);
        }
        h1 { font-family: 'Itim', cursive; color: #ff85a2; }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            padding: 25px;
            transition: 0.3s;
        }
        .glass-card:hover { transform: scale(1.02); }

        .table-custom {
            border-radius: 20px;
            overflow: hidden;
            border: none;
        }
        .table-custom thead {
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            color: white;
        }
        .chart-label {
            font-weight: bold;
            color: #7d7d7d;
            margin-bottom: 15px;
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="header-section text-center">
    <div class="container">
        <h1>ภัทรวดี ขามประโคน (การ์ตูน)</h1>
        <p class="text-muted">✨ รายงานสรุปยอดขาย Supermarket รายประเทศ ✨</p>
    </div>
</div>

<div class="container">
    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="glass-card">
                <span class="chart-label">📊 สัดส่วนยอดขาย</span>
                <canvas id="myPieChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <div class="col-md-7">
            <div class="glass-card">
                <span class="chart-label">📈 ยอดขายรวมแต่ละประเทศ (รายได้)</span>
                <canvas id="myBarChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <div class="col-12">
            <div class="glass-card mt-2">
                <h5 class="mb-4 fw-bold" style="color: #ff85a2;">📑 รายละเอียดข้อมูลสรุป</h5>
                <table class="table table-custom table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>ลำดับ</th>
                            <th class="text-start">ประเทศ</th>
                            <th>ยอดขายรวม (บาท)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once("connectdb.php");
                    $sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country ORDER BY total DESC";
                    $rs = mysqli_query($conn, $sql);
                    
                    $labels = [];
                    $values = [];
                    $count = 1;

                    while ($data = mysqli_fetch_array($rs)) {
                        $labels[] = $data['p_country'];
                        $values[] = (float)$data['total'];
                    ?>
                        <tr class="text-center">
                            <td><span class="badge rounded-pill bg-light text-dark shadow-sm px-3"><?php echo $count++; ?></span></td>
                            <td class="text-start fw-semibold"><?php echo $data['p_country']; ?></td>
                            <td class="fw-bold text-end" style="color: #6a82fb;"><?php echo number_format($data['total'], 2); ?></td>
                        </tr>
                    <?php 
                    }
                    mysqli_close($conn);
                    ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const labels = <?php echo json_encode($labels); ?>;
    const dataValues = <?php echo json_encode($values); ?>;
    
    // โทนสี Bright & Fresh Pastel
    const colors = ['#FF9AA2', '#FFB7B2', '#FFDAC1', '#E2F0CB', '#B5EAD7', '#C7CEEA', '#F3D1F4'];

    // กราฟวงกลมแบบ Doughnut
    new Chart(document.getElementById('myPieChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: colors,
                hoverOffset: 20
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom', labels: { font: { family: 'Sarabun' } } }
            }
        }
    });

    // กราฟแท่งแบบ แนวนอน (Horizontal Bar)
    new Chart(document.getElementById('myBarChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดรวม',
                data: dataValues,
                backgroundColor: colors,
                borderRadius: 20,
                borderSkipped: false,
            }]
        },
        options: {
            indexAxis: 'y', // เปลี่ยนเป็นแนวนอน
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { display: false } }
            }
        }
    });
</script>

</body>
</html>