<?php
if (isset($_POST['Submit'])) {
    // รับค่าพื้นฐาน
    $position   = $_POST['position'] ;
    $title      = $_POST['title'] ;
    $fullname   = $_POST['fullname'] ;
    $birthday   = $_POST['birthday'] ;
    $education  = $_POST['education'] ;
    $experience = $_POST['experience'] ;

    // --- จุดสำคัญ: แก้ไขเรื่อง Array สำหรับ Skills ---
    $skills_data = $_POST['skills'] ;
    if (is_array($skills_data)) {
        // ถ้าส่งมาเป็น Array ให้รวมเป็นข้อความคั่นด้วยคอมม่า
        $skills = implode(", ", $skills_data);
    } else {
        $skills = $skills_data;
    }
    // -------------------------------------------
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ข้อมูลใบสมัคร</title>
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="card shadow border-success">
            <div class="card-header bg-success text-white">✅ ข้อมูลใบสมัครที่ได้รับ</div>
            <div class="card-body">
                <p><strong>ชื่อ-นามสกุล:</strong> <?php echo htmlspecialchars($title . $fullname); ?></p>
                <p><strong>ตำแหน่ง:</strong> <?php echo htmlspecialchars($position); ?></p>
                <p><strong>ความสามารถพิเศษ:</strong> 
                    <?php 
                        // ตอนนี้ $skills เป็นข้อความ (String) แน่นอนแล้ว จะไม่ขึ้น Warning อีก
                        echo htmlspecialchars((string)$skills); 
                    ?>
                </p>
                <p><strong>ประสบการณ์:</strong><br><?php echo nl2br(htmlspecialchars($experience)); ?></p>
                <hr>
                <a href="javascript:history.back()" class="btn btn-secondary">กลับไปหน้าฟอร์ม</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>