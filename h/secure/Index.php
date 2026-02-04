<?php
session_start();
$error_msg = "";

if (isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        
        // 2. ตรวจสอบรหัสผ่านแบบเข้ารหัส
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit();
        } else {
            $error_msg = "Username หรือ Password ไม่ถูกต้อง";
        }
    } else {
        $error_msg = "Username หรือ Password ไม่ถูกต้อง";
    }
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>66010914055 ภัทรวดี - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Kanit', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2.5rem;
        }
        .btn-pastel {
            background: linear-gradient(to right, #ff9a9e, #fad0c4);
            border: none;
            color: #555;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-pastel:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
            color: #000;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            border-color: #a6c1ee;
            box-shadow: 0 0 0 0.25rem rgba(166, 193, 238, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="login-card">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-secondary">เข้าสู่ระบบหลังบ้าน</h3>
                    <p class="text-muted small">ภัทรวดี ขามประโคน (การ์ตูน)</p>
                </div>

                <?php if($error_msg): ?>
                    <div class="alert alert-danger py-2 text-center" style="font-size: 0.9rem;">
                        <?= $error_msg ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label text-muted">Username</label>
                        <input type="text" name="auser" class="form-control" placeholder="ชื่อผู้ใช้งาน" autofocus required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted">Password</label>
                        <input type="password" name="apwd" class="form-control" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="Submit" class="btn btn-pastel py-2 rounded-pill shadow-sm">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>