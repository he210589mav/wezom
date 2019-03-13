<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!--** Написать программу ищет слово во всех файлах которые находятся в заданной директории и выводит список файлов где это слово содержится-->

<form action="file3.php" method="POST">
	Введите слово:<input name="word" type="text">
	<input type="submit"><br>
<?php
$w=trim($_POST['word']);
$arr= glob("./uploads/*.txt");
foreach ($arr as $val){
	 echo "в файле $val слово $w встречается"," ",substr_count(file_get_contents($val),$w )," ", "раз(а)","<br>";
     }
?>