<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการ Login
if (!isset($_SESSION['aid'])) {
    header("Location: login.php");
    exit();
}

// ระบบค้นหาลูกค้า (ค้นหาจากชื่อหรือเบอร์โทร)
$search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";
// สมมติตารางชื่อ member มีฟิลด์ m_id, m_name, m_email, m_phone
$stmt = $conn->prepare("SELECT * FROM member WHERE m_name LIKE ? OR m_email LIKE ? ORDER BY m_id DESC");
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f0f7ff; /* ฟ้าอ่อนมาก */
            font-family: 'Kanit', sans-serif;
        }
        .navbar-pastel {
            background: linear-gradient(90deg, #fbc2eb 0%, #a6c1ee 100%);
            padding: 1.5rem;
            border-radius: 0 0 30px 30px;
        }
        .card-table {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            background: white;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            background-color: #fbc2eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .btn-action {
            border-radius: 10px;
            transition: 0.2s;
        }
        .btn-action:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="navbar-pastel text-white text-center mb-4 shadow">
    <h2 class="fw-bold mb-0"><i class="bi bi-people-fill me-2"></i> ระบบจัดการข้อมูลลูกค้า</h2>
    <p class="small mb-0 opacity-75">Admin Online: <?php echo htmlspecialchars($_SESSION['aname']); ?></p>
</div>

<div class="container">
    <div class="d-flex justify-content-center gap-2 mb-4">
        <a href="index2.php" class="btn btn-white shadow-sm rounded-pill px-4 bg-white">หน้าหลัก</a>
        <a href="products.php" class="btn btn-white shadow-sm rounded-pill px-4 bg-white">สินค้า</a>
        <a href="orders.php" class="btn btn-white shadow-sm rounded-pill px-4 bg-white">ออเดอร์</a>
    </div>

    <div class="card card-table p-4 mb-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <h4 class="text-secondary fw-bold">รายชื่อสมาชิกทั้งหมด</h4>
            </div>
            <div class="col-md-6">
                <form method="get" class="input-group">
                    <input type="text" name="search" class="form-control border-info-subtle rounded-start-pill" placeholder="ค้นหาชื่อหรืออีเมล..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button class="btn btn-info text-white rounded-end-pill px-4" type="submit">ค้นหา</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">ลูกค้า</th>
                        <th class="border-0">อีเมล</th>
                        <th class="border-0">เบอร์โทรศัพท์</th>
                        <th class="border-0 text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['m_id']; ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle me-3">
                                    <?php echo mb_substr($row['m_name'], 0, 1, 'UTF-8'); ?>
                                </div>
                                <span class="fw-medium"><?php echo htmlspecialchars($row['m_name']); ?></span>
                            </div>
                        </td>
                        <td class="text-muted"><?php echo htmlspecialchars($row['m_email']); ?></td>
                        <td><?php echo htmlspecialchars($row['m_phone']); ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary btn-action me-1"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-action" onclick="return confirm('ยืนยันการลบลูกค้าท่านนี้?')"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>