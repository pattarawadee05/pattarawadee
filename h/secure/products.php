<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการ Login (สมมติว่า check_login.php มีการเช็ค session ไว้แล้ว)
if (!isset($_SESSION['aid'])) {
    header("Location: login.php");
    exit();
}

// ระบบค้นหาสินค้า (ป้องกัน SQL Injection)
$search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";
$stmt = $conn->prepare("SELECT * FROM product WHERE p_name LIKE ? ORDER BY p_id DESC");
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Kanit', sans-serif;
        }
        .header-section {
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
            padding: 40px 0;
            color: white;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            margin-bottom: 30px;
        }
        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .table thead {
            background-color: #fbc2eb;
            color: #666;
        }
        .btn-add {
            background-color: #a6c1ee;
            color: white;
            border-radius: 50px;
        }
        .btn-add:hover { background-color: #95b3e4; color: white; }
        .badge-price { background-color: #ffe5e5; color: #ff5252; border-radius: 10px; }
    </style>
</head>
<body>

<div class="header-section text-center shadow-sm">
    <div class="container">
        <h1 class="fw-bold"><i class="bi bi-box-seam me-2"></i> จัดการข้อมูลสินค้า</h1>
        <p>ยินดีต้อนรับคุณ: <strong><?php echo $_SESSION['aname']; ?></strong></p>
        <a href="index2.php" class="btn btn-sm btn-light rounded-pill px-3 mt-2">กลับหน้าหลัก</a>
    </div>
</div>

<div class="container">
    <div class="card card-custom p-4 mb-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <form method="get" action="" class="d-flex">
                    <input type="text" name="search" class="form-control rounded-pill me-2" placeholder="ค้นหาชื่อสินค้า..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="btn btn-pastel-blue btn-outline-secondary rounded-pill px-4">ค้นหา</button>
                </form>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="add_product.php" class="btn btn-add px-4"><i class="bi bi-plus-circle me-1"></i> เพิ่มสินค้าใหม่</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th class="px-4 py-3">รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="px-4"><?php echo $row['p_id']; ?></td>
                        <td class="fw-medium"><?php echo htmlspecialchars($row['p_name']); ?></td>
                        <td><span class="badge badge-price px-3 py-2"><?php echo number_format($row['p_price'], 2); ?> ฿</span></td>
                        <td class="text-center">
                            <a href="edit_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-outline-primary rounded-pill me-1">
                                <i class="bi bi-pencil"></i> แก้ไข
                            </a>
                            <a href="delete_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('ยืนยันการลบสินค้า?')">
                                <i class="bi bi-trash"></i> ลบ
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    
                    <?php if($result->num_rows == 0): ?>
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">ไม่พบข้อมูลสินค้าที่ค้นหา</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>