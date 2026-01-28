<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>66010914055 ภัทรวดี ขามประโคน (การ์ตูน)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #fafafa; color: #555; padding: 20px; }
        .container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .chart-box { width: 450px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #fce4ec; color: #ad1457; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #eee; text-align: center; }
        h1 { text-align: center; color: #d81b60; }
    </style>
</head>

<body>
    <h1>📊 รายงานยอดขายรายเดือน</h1>
    <center><p>66010914055 ภัทรวดี ขามประโคน (การ์ตูน)</p></center>

    <?php
        include_once("connectdb.php");
        $sql = "SELECT MONTH(p_date) AS Month, SUM(p_amount) AS Total_Sales FROM popsupermarket GROUP BY MONTH(p_date) ORDER BY Month;";
        $rs = mysqli_query($conn, $sql);

        $labels = [];
        $values = [];
        
        // เก็บข้อมูลลง Array เพื่อใช้กับกราฟ
        while ($data = mysqli_fetch_array($rs)) {
            $labels[] = "เดือน " . $data['Month'];
            $values[] = $data['Total_Sales'];
        }
    ?>

    <div class="container">
        <div class="card">
            <h3>📋 ตารางสรุปยอดขาย</h3>
            <table>
                <tr>
                    <th>เดือน</th>
                    <th>ยอดขาย (บาท)</th>
                </tr>
                <?php foreach ($labels as $index => $label) { ?>
                <tr>
                    <td><?php echo $label; ?></td>
                    <td align="right"><?php echo number_format($values[$index], 0); ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="card chart-box">
            <canvas id="barChart"></canvas>
        </div>

        <div class="card chart-box">
            <canvas id="donutChart"></canvas>
        </div>
    </div>

    <script>
        // กำหนดสี Pastel ละมุนๆ
        const pastelColors = [
            'rgba(255, 179, 186, 0.7)', // ชมพู
            'rgba(255, 223, 186, 0.7)', // ส้มอ่อน
            'rgba(255, 255, 186, 0.7)', // เหลือง
            'rgba(186, 255, 201, 0.7)', // เขียว
            'rgba(186, 225, 255, 0.7)', // ฟ้า
            'rgba(221, 186, 255, 0.7)'  // ม่วง
        ];
        const borderColor = 'rgba(255, 255, 255, 1)';

        const dataLabels = <?php echo json_encode($labels); ?>;
        const dataValues = <?php echo json_encode($values); ?>;

        // 1. Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: dataLabels,
                datasets: [{
                    label: 'ยอดขายรายเดือน',
                    data: dataValues,
                    backgroundColor: pastelColors,
                    borderRadius: 8
                }]
            },
            options: { plugins: { legend: { display: false } } }
        });

        // 2. Donut Chart
        new Chart(document.getElementById('donutChart'), {
            type: 'doughnut',
            data: {
                labels: dataLabels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: pastelColors,
                    borderColor: borderColor,
                    borderWidth: 2
                }]
            },
            options: { cutout: '60%' }
        });
    </script>
</body>
</html>