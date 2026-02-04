<?php
session_start();
$error_msg = "";

if (isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement ป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        
        // 2. ตรวจสอบรหัสผ่าน (แนะนำให้ใน DB เก็บแบบ password_hash)
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit();
        } else {
            $error_msg = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error_msg = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, #fbc2eb 0%, #a6c1ee 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Kanit', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        .btn-pastel {
            background: linear-gradient(to right, #ee9ca7, #ffdde1);
            border: none;
            color: #6a5a5a;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-pastel:hover {
            transform: scale(1.03);
            filter: brightness(1.05);
        }
        .form-control {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            padding: 12px;
        }
        .form-control:focus {
            border-color: #a6c1ee;
            box-shadow: 0 0 0 0.25rem rgba(166, 193, 238, 0.25);
        }
    </style>
</head>
<body>

<div class="glass-card">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-secondary">Backend Login</h2>
        <p class="text-muted">66010914055 ภัทรวดี (การ์ตูน)</p>
    </div>

    <?php if($error_msg): ?>
        <div class="alert alert-danger text-center py-2 mb-3" style="border-radius: 12px;">
            <?= $error_msg ?>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label text-secondary">Username</label>
            <input type="text" name="auser" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" autofocus required>
        </div>
        <div class="mb-4">
            <label class="form-label text-secondary">Password</label>
            <input type="password" name="apwd" class="form-control" placeholder="ระบุรหัสผ่าน" required>
        </div>
        <div class="d-grid">
            <button type="submit" name="Submit" class="btn btn-pastel py-2 shadow-sm rounded-pill">
                เข้าสู่ระบบ
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>