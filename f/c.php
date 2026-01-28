<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914055 ภัทรวดี ขามประโคน (การ์ตูน)</title>
</head>


<h1>66010914055 ภัทรวดี ขามประโคน (การ์ตูน)</h1>

<form method="post" action="">
	กรอกตัวเลข <input type="number" name="a" autofocus required>  
    <button type="submit" name="Submit">OK</button>
</form>
<hr>

<h1>
<?php
	$score = $_POST['a'];
			if ($score >= 80) {
				$grade = "A" ;
			} else if ($score >= 70) {
				$grade = "B" ;
			} else if ($score >= 60) {
				$grade = "C" ;
			} else if ($score >= 50) {
				$grade = "D" ;
			} else {
				$grade = "F" ;
			}
		echo "คะแนน $score ได้เกรด $grade" ;
?>
</h1>
<body>
</body>
</html>
