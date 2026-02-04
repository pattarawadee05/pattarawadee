<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการ Login
if (!isset($_SESSION['aid'])) {
    header("Location: login.php");
    exit();
}

// ระบบค้นหาเลขที่ออเดอร์ (ป้องกัน SQL Injection)
$search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";
// สมมติชื่อตาราง orders และมีฟิลด์ o_id, o_date, o_total, o_status
$stmt = $conn->prepare("SELECT * FROM orders WHERE o_id LIKE ? ORDER BY o_id DESC");
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #fdf2f8; /* พื้นหลังชมพูอ่อนมาก */
            font-family: 'Kanit', sans-serif;
        }
        .header-gradient {
            background: linear-gradient(135deg, #a6c1ee 0%, #fbc2eb 100%);
            padding: 50px 0;
            color: white;
            border-bottom-left-radius: 60px;
        }
        .card-main {
            border: none;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-top: -30px;
            background: white;
        }
        .table thead {
            background-color: #e3f2fd; /* ฟ้าพาสเทล */
            color: #555;
        }
        .status-pill {
            border-radius: 50px;
            padding: 5px 15px;
            font-size: 0.85rem;
        }
        .btn-detail {
            background-color: #fbc2eb;
            border: none;
            color: #7d4f73;
        }
        .btn-detail:hover {
            background-color: #f8a5d8;
        }
    </style>
</head>
<body>

<div class="header-gradient text-center">
    <div class="container">
        <h1 class="fw-bold"><i class="bi bi-receipt me-2"></i> รายการสั่งซื้อสินค้า</h1>
        <p class="mb-0">ผู้ดูแลระบบ: <span class="badge bg-white text-primary rounded-pill"><?php echo $_SESSION['aname']; ?></span></p>
    </div>
</div>

<div class="container mb-5">
    <div class="card card-main p-4">
        <div class="row mb-4 align-items-center">
            <div class="col-md-7">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index2.php" class="text-decoration-none text-info">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการออเดอร์</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-5 mt-3 mt-md-0">
                <form method="get" action="" class="input-group">
                    <input type="text" name="search" class="form-control rounded-start-pill border-info" placeholder="ค้นหาเลขที่ออเดอร์..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit" class="btn btn-info text-white rounded-end-pill px-4">ค้นหา</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th class="ps-4">เลขที่ออเดอร์</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ราคารวม</th>
                        <th>สถานะ</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-secondary">#<?php echo $row['o_id']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['o_date'])); ?></td>
                        <td><span class="text-primary fw-medium"><?php echo number_format($row['o_total'], 2); ?> ฿</span></td>
                        <td>
                            <span class="status-pill bg-light text-dark border border-info">รอดำเนินการ</span>
                        </td>
                        <td class="text-center">
                            <a href="order_detail.php?id=<?php echo $row['o_id']; ?>" class="btn btn-sm btn-detail rounded-pill px-3">
                                <i class="bi bi-eye"></i> ดูรายละเอียด
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>

                    <?php if($result->num_rows == 0): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">ไม่พบรายการสั่งซื้อ</p>
                        </td>
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