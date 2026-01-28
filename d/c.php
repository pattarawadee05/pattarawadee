<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>66010914055 ภัทรวดี ขามประโคน (การ์ตูน)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .color-input {
        width: 100%; /* ให้เต็มความกว้างในคอลัมน์ */
        height: 40px; /* เพิ่มความสูงเล็กน้อย */
    }
</style>
</head>

<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">ฟอร์มรับข้อมูล - ภัทรวดี ขามประโคน (การ์ตูน)</h1>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">ส่วนสูง (ซม.) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
                        <div class="form-text">ระหว่าง 100 ถึง 200 ซม.</div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">วันเดือนปีเกิด</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">สีที่ชอบ</label>
                        <input type="color" class="form-control form-control-color color-input" id="color" name="color" value="#563d7c" title="เลือกสี">
                    </div>

                    <div class="mb-3">
                        <label for="major" class="form-label">สาขาวิชา</label>
                        <select class="form-select" id="major" name="major">
                            <option value="การบัญชี">การบัญชี</option>
                            <option value="การตลาด">การตลาด</option>
                            <option value="การจัดการ">การจัดการ</option>
                            <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-block mt-4">
                        <button type="submit" name="Submit" class="btn btn-success me-2">
                            <i class="bi bi-person-plus-fill"></i> สมัครสมาชิก
                        </button>
                        <button type="reset" class="btn btn-warning me-2">
                            <i class="bi bi-x-circle-fill"></i> ยกเลิก
                        </button>
                        <button type="button" onClick="window.location='https://www.msu.ac.th/'; " class="btn btn-info me-2 text-white">
                            <i class="bi bi-globe"></i> Go to MSU
                        </button>
                        <button type="button" onMouseOver="alert('ล่ามเคะกั๊ก');" class="btn btn-secondary me-2">
                            Hello
                        </button>
                        <button type="button" onClick="window.print();" class="btn btn-dark">
                            <i class="bi bi-printer-fill"></i> พิมพ์
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <hr class="my-5">

        <?php
        if (isset($_POST['Submit'])){
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $height = $_POST['height'];
            $address = $_POST['address'];
            $birthday = $_POST['birthday'];
            $color = $_POST['color'];
            $major = $_POST['major'];
            ?>
            <div class="card shadow-lg border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">✅ ข้อมูลที่ได้รับ</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>ชื่อ-สกุล:</strong> <?php echo htmlspecialchars($fullname); ?></p>
                    <p class="card-text"><strong>เบอร์โทร:</strong> <?php echo htmlspecialchars($phone); ?></p>
                    <p class="card-text"><strong>ส่วนสูง:</strong> <?php echo htmlspecialchars($height); ?> ซม.</p>
                    <p class="card-text"><strong>ที่อยู่:</strong> <?php echo nl2br(htmlspecialchars($address)); ?></p>
                    <p class="card-text"><strong>วันเดือนปีเกิด:</strong> <?php echo htmlspecialchars($birthday); ?></p>
                    <p class="card-text"><strong>สีที่ชอบ:</strong> 
                        <span class="d-inline-block p-2 rounded" style='background-color:<?php echo htmlspecialchars($color); ?>; border: 1px solid #ccc;'>
                            <?php echo htmlspecialchars($color); ?>
                        </span>
                    </p>
                    <p class="card-text"><strong>สาขาวิชา:</strong> <?php echo htmlspecialchars($major); ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>