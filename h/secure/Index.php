<?php
session_start(); // อย่าลืม start session ที่บรรทัดแรกสุด
include_once("connectdb.php");

$error_msg = "";

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        
        // 2. ตรวจสอบรหัสผ่านที่เข้ารหัส (แนะนำใช้ password_hash ตอนสมัคร)
        // ถ้าใน DB ยังไม่ได้ hash ให้ใช้: if($pwd == $data['a_password'])
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            header("Location: index2.php");
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
    <style>
        body {
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%); /* Pastel Pink to Blue */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Kanit', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }
        .btn-pastel {
            background-color: #a6c1ee;
            border: none;
            color: white;
            transition: 0.3s;
        }
        .btn-pastel:hover {
            background-color: #fbc2eb;
            color: #555;
        }
        .form-control:focus {
            border-color: #fbc2eb;
            box-shadow: 0 0 0 0.25 cold rgba(251, 194, 235, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-card mx-auto">
        <h2 class="text-center mb-4 text-secondary">เข้าสู่ระบบหลังบ้าน</h2>
        <h6 class="text-center text-muted mb-4">โดย ภัทรวดี (การ์ตูน)</h6>

        <?php if($error_msg != ""): ?>
            <div class="alert alert-danger text-center py-2" role="alert">
                <?= $error_msg ?>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" autofocus required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="Submit" class="btn btn-pastel btn-lg rounded-pill">LOGIN</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>