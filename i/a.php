<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ภัทรวดี ขามประโคน (การ์ตูน)</title>
</head>

<body>
<h1>งาน iภัทรวดี ขามประโคน (การ์ตูน)</h1>

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
        <td width="80" align="center"><img src="img/delete.jpg" width="20"></td>
    
mysqli_close($conn);
?>


</body>
</html>