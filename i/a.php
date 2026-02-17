<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ภัทรวดี ขามประโคน(การ์ตูน)</title>
</head>

<body>
<h1>งาน i - ภัทรวดี ขามประโคน(การ์ตูน)</h1>

<form method="post" action="">
    ชื่อภาค <input type="text" name="rname" autofocus required>
    <button type="submit" name="Submit">บันทึก</button>
    </form><br><br>
    
<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");
    $rname = $_POST['rname'];
    $sql = "INSERT INTO regions (r_id, r_name) VALUES (NULL,'{$rame}')";
    mysqli_query($conn,$sql2) or die ("เพิ่มข้อมูลไม่ได้");
}

<?php
include_once("connectdb.php");
$sql = "SELECT * FROM regions";
$rs = mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($rs)){
    ehco $data['r_id'] . "<br>";
    ehco $data['r_name'] . "<hr>";
    }
mysqli_close($conn);
?>

<table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
        <th>ลบ</th>
    </tr>
<?php
include_once("connectdb.php")
$sql = "SELECT * FROM regions";
$rs = mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php ehco $data['r_id'] ; ?></td>
        <td><?php ehco $data['r_name'] ; ?></td>
        <td width="80" align="center"><img src="../img/delete.jpg" width="20"></td>
    </tr>
    <?php} ?>
</table>

</body>
</html>