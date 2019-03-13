<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!--* Написать программу которая ищет слово в файле произвольной длины-->

<form action="file2.php" method="POST">
	Введите слово:<input name="word" type="text">
	<input type="submit"><br>
<?php
$w=trim($_POST['word']);
$file='./uploads/test.txt';
echo "в файле $file слово $w встречается"," ",substr_count(strtolower(file_get_contents($file)),$w )," ", "раз(а)","<br>";
?>
