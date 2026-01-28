<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครงาน - เจริญ จำกัด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f0f2f5; font-family: 'Sarabun', sans-serif; }
        .card { border: none; border-radius: 15px; }
        .card-header { border-radius: 15px 15px 0 0 !important; }
        .form-label { font-weight: 600; color: #444; }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white py-3">
                <h2 class="card-title mb-0 text-center"><i class="bi bi-briefcase-fill me-2"></i> ร่วมงานกับ เจริญ จำกัด</h2>
            </div>
            <div class="card-body p-4">
                <form method="post" action="">
                    
                    <div class="mb-3">
                        <label for="position" class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                        <select class="form-select" id="position" name="position" required>
                            <option value="" selected disabled>-- เลือกตำแหน่งงาน --</option>
                            <option value="Full Stack Developer">Full Stack Developer</option>
                            <option value="UX/UI Designer">UX/UI Designer</option>
                            <option value="Digital Marketer">Digital Marketer</option>
                            <option value="Data Analyst">Data Analyst</option>
                            <option value="HR & Admin">HR & Admin</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label d-block">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="mr" value="นาย" required>
                                <label class="form-check-label" for="mr">นาย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="ms" value="นางสาว">
                                <label class="form-check-label" for="ms">นางสาว</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="mrs" value="นาง">
                                <label class="form-check-label" for="mrs">นาง</label>
                            </div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="fullname" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="ภาษาไทย หรือ ภาษาอังกฤษ" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="birthday" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="education" class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                            <select class="form-select" id="education" name="education" required>
                                <option value="ปวส.">ปวส.</option>
                                <option value="ปริญญาตรี" selected>ปริญญาตรี</option>
                                <option value="ปริญญาโท">ปริญญาโท</option>
                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">ความสามารถพิเศษ</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="skills[]" value="ภาษาอังกฤษ" id="eng">
                            <label class="form-check-label" for="eng">ภาษาอังกฤษ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="skills[]" value="ขับรถยนต์" id="drive">
                            <label class="form-check-label" for="drive">ขับรถยนต์</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="skills[]" value="ตัดต่อวิดีโอ" id="video">
                            <label class="form-check-label" for="video">ตัดต่อวิดีโอ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="skills[]" value="AI Prompting" id="ai">
                            <label class="form-check-label" for="ai">AI Prompting</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="experience" class="form-label">ประสบการณ์ทำงาน (ระบุบริษัทและระยะเวลา)</label>
                        <textarea class="form-control" id="experience" name="experience" rows="4" placeholder="ระบุประวัติการทำงานที่ผ่านมา..."></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                        <button type="submit" name="Submit" class="btn btn-primary px-5 py-2">
                            <i class="bi bi-send-fill me-2"></i> ส่งใบสมัคร
                        </button>
                        <button type="reset" class="btn btn-outline-secondary px-5 py-2">
                            <i class="bi bi-arrow-counterclockwise me-2"></i> ล้างข้อมูล
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <hr class="my-5">

        <?php
        if (isset($_POST['Submit'])){
            $position = $_POST['position'];
            $title = $_POST['title'];
            $fullname = $_POST['fullname'];
            $birthday = $_POST['birthday'];
            $education = $_POST['education'];
            $experience = $_POST['experience'];
            $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : "ไม่มี";
			
			include_once("connectdb.php");
            
        	$sql = "INSERT INTO appication (r_id, r_position, r_title, r_name,  r_birthday, r_education, r_experience, r_skills) VALUES (NULL,  '{$position}', '{$title}', '{$fullname}', '{$birthday}', '{$education}', '{$experience}', '{$skills}');";
			
            mysqli_query($conn, $sql) or die ("insert ไม่ได้");
            
            echo "<script>";
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            echo "</script>";
			 
            ?>
            <div class="card shadow-lg border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-check-circle-fill me-2"></i> ส่งใบสมัครสำเร็จแล้ว!</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>ตำแหน่งที่สมัคร:</strong> <span class="text-primary font-weight-bold"><?php echo htmlspecialchars($position); ?></span></p>
                            <p><strong>ชื่อ-สกุล:</strong> <?php echo htmlspecialchars($title . $fullname); ?></p>
                            <p><strong>วันเดือนปีเกิด:</strong> <?php echo htmlspecialchars($birthday); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>ระดับการศึกษา:</strong> <?php echo htmlspecialchars($education); ?></p>
                            <p><strong>ความสามารถพิเศษ:</strong> <?php echo htmlspecialchars($skills); ?></p>
                        </div>
                    </div>
                    <hr>
                    <p><strong>ประสบการณ์ทำงาน:</strong><br>
                    <span class="text-muted"><?php echo nl2br(htmlspecialchars($experience)); ?></span></p>
                    
                    <button type="button" onClick="window.print();" class="btn btn-sm btn-dark mt-2">
                        <i class="bi bi-printer"></i> พิมพ์ใบสมัครนี้
                    </button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>