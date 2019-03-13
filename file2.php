<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!--* Написать программу которая ищет слово в файле произвольной длины-->

<form action="file2.php" method="POST">
	Введите слово:<input name="world" type="text">
	<input type="submit">
<?php
$w=trim($_POST['world']);
$file='./uploads/test.txt';
if (strpos(file_get_contents($file), $w))
echo "Искомое слово $w найдено";  
else echo "Искомое слово $w отсутствует";
?>
