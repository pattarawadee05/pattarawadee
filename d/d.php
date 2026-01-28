<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มรับข้อมูล - ภัทรวดี ขามประโคน (การ์ตูน)</title>
    <!-- Link to Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            padding: 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-label span {
            color: red;
        }
        .sub-text {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .btn-custom {
            border-radius: 5px;
            padding: 8px 20px;
            color: white;
            border: none;
        }
        .btn-submit {
            background-color: #007bff;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-cancel {
            background-color: #dc3545;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-header text-start">
            ฟอร์มรับข้อมูล - ภัทรวดี ขามประโคน (การ์ตูน)
        </div>
        <div class="card-body p-4">
            <form action="f.php" method="post">
                <!-- ชื่อ-นามสกุล -->
                <div class="mb-3">
                    <label class="form-label">ชื่อ-นามสกุล <span>*</span></label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>

                <!-- เบอร์โทร -->
                <div class="mb-3">
                    <label class="form-label">เบอร์โทร <span>*</span></label>
                    <input type="tel" name="phone" class="form-control" required>
                </div>

                <!-- เพศ -->
                <div class="mb-3">
                    <label class="form-label">เพศ <span>*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="" disabled selected>กรุณาเลือกเพศ</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                    </select>
                </div>

                <!-- ที่อยู่ -->
                <div class="mb-3">
                    <label class="form-label">ที่อยู่ <span>*</span></label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <!-- วันเกิด -->
                <div class="mb-3">
                    <label class="form-label">วันเกิด <span>*</span></label>
                    <input type="date" name="dob" class="form-control" required>
                </div>

                <!-- สีที่ชอบ -->
                <div class="mb-3">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="favoriteColor" class="form-control form-control-color" value="#000000">
                </div>

                <!-- อาชีพ -->
                <div class="mb-3">
                    <label class="form-label">อาชีพ <span>*</span></label>
                    <select name="occupation" class="form-select" required>
                        <option value="" disabled selected>กรุณาเลือกอาชีพ</option>
                        <option value="student">นักเรียน/นักศึกษา</option>
                        <option value="worker">พนักงาน</option>
                        <option value="other">อื่นๆ</option>
                    </select>
                </div>

                <!-- ปุ่มสมัครสมาชิกและยกเลิก -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-submit btn-custom">สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-cancel btn-custom">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Link to Bootstrap 5.3 JS and Popper.js (for responsive elements) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
