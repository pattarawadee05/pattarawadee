<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการ Login
if (!isset($_SESSION['aid'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อน'); window.location='index.php';</script>";
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff5f8; font-family: 'Prompt', sans-serif; }
        .navbar-pink { background-color: #f06292; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(240, 98, 146, 0.1); }
        .table thead { background-color: #fce4ec; color: #ad1457; }
        .status-badge { border-radius: 50px; padding: 5px 15px; font-size: 0.85rem; }
        .btn-detail { background-color: #f06292; color: white; border: none; }
        .btn-detail:hover { background-color: #d81b60; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-pink shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index2.php">Admin Panel</a>
        <div class="navbar-text text-white">
            แอดมิน: <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #ad1457;">📜 รายการสั่งซื้อสินค้า</h2>
        <span class="badge bg-white text-dark shadow-sm p-2 px-3 rounded-pill">การ์ตูน: 66010914055</span>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>รหัสออเดอร์</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>ราคารวม</th>
                        <th>สถานะ</th>
                        <th class="text-center">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ใช้การ Join ตารางเพื่อดึงข้อมูลลูกค้ามาแสดง (สมมติว่ามีตาราง orders และ customers)
                    $sql = "SELECT orders.*, customers.c_name 
                            FROM orders 
                            LEFT JOIN customers ON orders.c_id = customers.c_id 
                            ORDER BY orders.o_id DESC";
                    $rs = mysqli_query($conn, $sql);
                    
                    while ($data = mysqli_fetch_array($rs)) {
                    ?>
                    <tr>
                        <td>#<?= $data['o_id']; ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($data['o_date'])); ?></td>
                        <td><?= htmlspecialchars($data['c_name']); ?></td>
                        <td class="fw-bold text-primary"><?= number_format($data['o_total'], 2); ?> ฿</td>
                        <td>
                            <?php if($data['o_status'] == 0): ?>
                                <span class="status-badge bg-warning text-dark">รอดำเนินการ</span>
                            <?php else: ?>
                                <span class="status-badge bg-success text-white">ชำระเงินแล้ว</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="order_detail.php?id=<?= $data['o_id']; ?>" class="btn btn-sm btn-detail rounded-pill px-3">ดูรายละเอียด</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-4 text-center">
        <a href="index2.php" class="text-decoration-none text-muted">← กลับหน้าหลักแอดมิน</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>