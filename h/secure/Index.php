<?php
session_start(); // สำคัญ: ต้องมี session_start() เพื่อใช้ $_SESSION
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd = $_POST['apwd'];

    // ป้องกัน SQL Injection ด้วย Prepared Statement
    $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_array($result)) {
        // ตรวจสอบรหัสผ่านที่เข้ารหัสไว้ (ใช้ password_verify)
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            echo "<script>window.location='index2.php';</script>";
            exit;
        }
    }
    
    // ถ้าไม่ผ่าน
    echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - ภัทรวดี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fce4ec; } /* พื้นหลังชมพูอ่อน */
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-pink { background-color: #f06292; color: white; border: none; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
        .form-control:focus { border-color: #f06292; box-shadow: 0 0 0 0.25rem rgba(240, 98, 146, 0.25); }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4" style="color: #ad1457;">เข้าสู่ระบบหลังบ้าน</h3>
                    <p class="text-muted text-center small">ภัทรวดี ขามประโคน (การ์ตูน)</p>
                    <hr>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="auser" class="form-control" placeholder="ชื่อผู้ใช้งาน" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="apwd" class="form-control" placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" name="Submit" class="btn btn-pink">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
