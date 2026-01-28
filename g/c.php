<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>66010914055 ภัทรวดี ขามประโคน</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; padding-top: 50px; }
        .table-container { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        .product-img { border-radius: 5px; object-fit: cover; }
    </style>
</head>

<body>

<div class="container">
    <div class="table-container">
        <h2 class="mb-4 text-primary text-center">66010914055 ภัทรวดี ขามประโคน (การ์ตูน)</h2>
        <hr>
        
        <table id="myOrderTable" class="table table-striped table-hover" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>ชื่อสินค้า</th>
                    <th>ประเภทสินค้า</th>
                    <th>วันที่</th>
                    <th>ประเทศ</th>
                    <th class="text-end">จำนวนเงิน</th>
                    <th class="text-center">รูปภาพ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("connectdb.php");
                $sql = "SELECT * FROM popsupermarket";
                $rs = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($rs)) {
                ?>
                <tr>
                    <td><?php echo $data['p_order_id']; ?></td>
                    <td><strong><?php echo $data['p_product_name']; ?></strong></td>
                    <td><span class="badge bg-info text-dark"><?php echo $data['p_category']; ?></span></td>
                    <td><?php echo $data['p_date']; ?></td>
                    <td><?php echo $data['p_country']; ?></td>
                    <td class="text-end text-success fw-bold"><?php echo number_format($data['p_amount'], 2); ?></td>
                    <td class="text-center">
                        <img src="images/<?php echo $data['p_product_name']; ?>.jpg" 
                             alt="product" 
                             width="50" height="50" 
                             class="product-img shadow-sm">
                    </td>
                </tr>
                <?php 
                }
                mysqli_close($conn);
                ?> 
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myOrderTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json" // เมนูภาษาไทย
            },
            "pageLength": 10
        });
    });
</script>

</body>
</html>