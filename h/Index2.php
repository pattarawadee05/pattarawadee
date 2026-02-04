<?php
session_start();

// ตรวจสอบว่าได้ Login หรือยัง ถ้าไม่มี Session ให้เด้งกลับไปหน้า Login
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
    <title>Dashboard - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #fff5f8; 
            font-family: 'Prompt', sans-serif;
        }
        .navbar-pink { 
            background-color: #f06292; 
        }
        .card-menu {
            border: none;
            border-radius: 20px;
            transition: transform 0.3s ease;
            text-decoration: none;
            color: #ad1457;
            background: white;
            box-shadow: 0 4px 10px rgba(240, 98, 146, 0.15);
        }
        .card-menu:hover {
            transform: translateY(-10px);
            background-color: #fce4ec;
            color: #f06292;
        }
        .welcome-text {
            color: #880e4f;
            font-weight: 600;
        }
        .logout-btn {
            background-color: #ff80ab;
            border: none;
            color: white;
        }
        .logout-btn:hover {
            background-color: #f50057;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-pink mb-5 shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel - ภัทรวดี</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                สวัสดีคุณ: <strong><?php echo $_SESSION['aname']; ?></strong>
            </span>
            <a href="logout.php" class="btn btn-sm logout-btn rounded-pill px-3">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h2 class="welcome-text">ระบบจัดการหลังบ้าน (Back-end System)</h2>
        <p class="text-muted">ยินดีต้อนรับคุณการ์ตูน เข้าสู่ระบบจัดการข้อมูล</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <a href="products.php" class="card card-menu h-100 p-4 text-center d-block">
                <div class="mb-3">
                    <span style="font-size: 3rem;">📦</span>
                </div>
                <h5>จัดการสินค้า</h5>
            </a>
        </div>

        <div class="col-md-3">
            <a href="orders.php" class="card card-menu h-100 p-4 text-center d-block">
                <div class="mb-3">
                    <span style="font-size: 3rem;">📜</span>
                </div>
                <h5>จัดการออเดอร์</h5>
            </a>
        </div>

        <div class="col-md-3">
            <a href="customers.php" class="card card-menu h-100 p-4 text-center d-block">
                <div class="mb-3">
                    <span style="font-size: 3rem;">👥</span>
                </div>
                <h5>จัดการลูกค้า</h5>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>