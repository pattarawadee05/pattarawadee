<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการ Login (ใช้ไฟล์เดียวกับที่เคยทำ)
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
    <title>จัดการสินค้า - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff5f8; font-family: 'Prompt', sans-serif; }
        .navbar-pink { background-color: #f06292; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(240, 98, 146, 0.1); }
        .table thead { background-color: #f8bbd0; color: #ad1457; }
        .btn-add { background-color: #ec407a; color: white; border-radius: 50px; }
        .btn-add:hover { background-color: #d81b60; color: white; }
        .img-product { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-pink shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index2.php">Admin System</a>
        <div class="navbar-text text-white">
            แอดมิน: <strong><?php echo $_SESSION['aname']; ?></strong>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #ad1457;">📦 จัดการข้อมูลสินค้า</h2>
        <a href="add_product.php" class="btn btn-add px-4">+ เพิ่มสินค้าใหม่</a>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ดึงข้อมูลด้วย SQL ธรรมดา (กรณีแสดงรายการทั้งหมด) 
                    // แต่ถ้ามีการค้นหา ให้ใช้ Prepared Statement เสมอ
                    $sql = "SELECT * FROM product ORDER BY p_id DESC";
                    $rs = mysqli_query($conn, $sql);
                    
                    while ($data = mysqli_fetch_array($rs)) {
                    ?>
                    <tr>
                        <td><?= $data['p_id']; ?></td>
                        <td>
                            <img src="images/<?= $data['p_img']; ?>" class="img-product" alt="Product Image">
                        </td>
                        <td><?= htmlspecialchars($data['p_name']); ?></td>
                        <td><?= number_format($data['p_price'], 2); ?> บาท</td>
                        <td class="text-center">
                            <a href="edit_product.php?id=<?= $data['p_id']; ?>" class="btn btn-sm btn-outline-warning rounded-pill">แก้ไข</a>
                            <a href="delete_product.php?id=<?= $data['p_id']; ?>" 
                               class="btn btn-sm btn-outline-danger rounded-pill" 
                               onclick="return confirm('ยืนยันการลบสินค้าชิ้นนี้?')">ลบ</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-4 text-center">
        <a href="index2.php" class="text-decoration-none text-muted">← กลับหน้าหลัก</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>