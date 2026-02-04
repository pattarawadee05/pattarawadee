<?php
session_start();

// ตรวจสอบว่าได้ Login หรือยัง ถ้าไม่มีค่า Session ให้ดีดกลับไปหน้า login.php
if (!isset($_SESSION['aid'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%); /* Blue-Pink Pastel Gradient */
            font-family: 'Kanit', sans-serif;
            min-height: 100vh;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .menu-card {
            border: none;
            border-radius: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
            text-decoration: none;
            color: #555;
        }
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            color: #000;
        }
        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 2rem;
        }
        .bg-pastel-pink { background-color: #ffdeeb; color: #ff85a1; }
        .bg-pastel-blue { background-color: #d1e9ff; color: #4ea8de; }
        .bg-pastel-purple { background-color: #f3e5f5; color: #ab47bc; }
        .bg-pastel-red { background-color: #ffe5e5; color: #ff5252; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold text-secondary" href="#">ADMIN PANEL</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="me-3 text-muted">ยินดีต้อนรับ, <strong><?php echo $_SESSION['aname']; ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-3">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white shadow-sm d-inline-block p-2 px-4 rounded-4" style="background: rgba(255,255,255,0.2);">หน้าหลักแอดมิน - ภัทรวดี</h1>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <a href="products.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-box bg-pastel-pink">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5 class="fw-bold">จัดการสินค้า</h5>
                <p class="text-muted small">เพิ่ม แก้ไข ลบรายการสินค้า</p>
            </a>
        </div>

        <div class="col-md-3">
            <a href="orders.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-box bg-pastel-blue">
                    <i class="bi bi-cart-check"></i>
                </div>
                <h5 class="fw-bold">จัดการออเดอร์</h5>
                <p class="text-muted small">ตรวจสอบรายการสั่งซื้อ</p>
            </a>
        </div>

        <div class="col-md-3">
            <a href="customers.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-box bg-pastel-purple">
                    <i class="bi bi-people"></i>
                </div>
                <h5 class="fw-bold">จัดการลูกค้า</h5>
                <p class="text-muted small">ข้อมูลสมาชิกและที่อยู่</p>
            </a>
        </div>

        <div class="col-md-3">
            <a href="logout.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-box bg-pastel-red">
                    <i class="bi bi-box-arrow-right"></i>
                </div>
                <h5 class="fw-bold">ออกจากระบบ</h5>
                <p class="text-muted small">Logout ออกจากเซสชั่น</p>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>