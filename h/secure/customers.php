<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบความปลอดภัย: ต้อง Login ก่อนเข้าหน้าเดิม
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
    <title>จัดการลูกค้า - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff5f8; font-family: 'Prompt', sans-serif; }
        .navbar-pink { background-color: #f06292; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(240, 98, 146, 0.1); }
        .table thead { background-color: #f8bbd0; color: #ad1457; }
        .btn-action { border-radius: 50px; font-size: 0.85rem; }
        .customer-avatar { width: 40px; height: 40px; background-color: #fce4ec; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #f06292; font-weight: bold; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-pink shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index2.php">Admin Panel</a>
        <div class="navbar-text text-white">
            แอดมิน: <strong><?= htmlspecialchars($_SESSION['aname']); ?></strong>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #ad1457;">👥 รายชื่อลูกค้า</h2>
        <span class="text-muted small">ภัทรวดี: 66010914055</span>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ลูกค้า</th>
                        <th>อีเมล / เบอร์โทรศัพท์</th>
                        <th>วันที่สมัครสมาชิก</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ดึงข้อมูลลูกค้า
                    $sql = "SELECT * FROM customers ORDER BY c_id DESC";
                    $rs = mysqli_query($conn, $sql);
                    
                    while ($data = mysqli_fetch_array($rs)) {
                    ?>
                    <tr>
                        <td><?= $data['c_id']; ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="customer-avatar me-2"><?= mb_substr($data['c_name'], 0, 1); ?></div>
                                <strong><?= htmlspecialchars($data['c_name']); ?></strong>
                            </div>
                        </td>
                        <td>
                            <div class="small"><?= htmlspecialchars($data['c_email']); ?></div>
                            <div class="text-muted x-small"><?= htmlspecialchars($data['c_phone'] ?? '-'); ?></div>
                        </td>
                        <td><?= date('d/m/Y', strtotime($data['c_reg_date'])); ?></td>
                        <td class="text-center">
                            <a href="edit_customer.php?id=<?= $data['c_id']; ?>" class="btn btn-sm btn-outline-primary btn-action px-3">แก้ไข</a>
                            <a href="delete_customer.php?id=<?= $data['c_id']; ?>" 
                               class="btn btn-sm btn-outline-danger btn-action px-3"
                               onclick="return confirm('ต้องการลบข้อมูลลูกค้าท่านนี้หรือไม่?')">ลบ</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-4 text-center">
        <a href="index2.php" class="text-decoration-none text-muted small">← กลับหน้าหลัก</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>