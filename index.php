<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!--Написать функцию которая генерирует случайный пароль , в качестве аргумента принимает число определяющее длину пароля-->
<form action="index.php" method="POST">
	Введите длину пароля:<input name="password" type="text">
	<input type="submit">
</form>
<?php
$p=(int)$_POST['password'];
$a=("0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM");
$b=str_shuffle($a);
echo substr($b,0,$p),'<br>';
echo'-----------------------------------------------------------------','<br>';
?>


<!--Написать функцию которая принимает переданное 6-значное число из формы, и определяет совпадают ли первые 3 цифры с последними. Если условие выполняется, то выводится сообщение об успехе, иначе о неудаче-->

<form action="index.php" method="POST">
	Введите 6ти значное число:<input name="numbers" type="text">
	<input type="submit">
</form>
<?php
$n=(int)$_POST['numbers'];
$k=$n/1000;
$x=floor($k);
$y=floor(($k-$x)*1000);
echo "Первая часть числа -"," ",$x,"<br>";
echo "Вторая часть числа -"," ",$y,"<br>";
if ($x==$y){
	echo "TRUE",'<br>';
}
else echo "FALSE",'<br>';
echo'-----------------------------------------------------------------','<br>';
?>

<!--Задача разменный автомат. В функцию передается некое целое число являющееся  суммой (N), которую нужно выплатить, 
в функции определен массив номиналов array(‘1’=>1,’2’=>2,’5’=>5,’10’=>10,’20’=>20,’50’=>50,’100’=>100,’200’=>200,’500’=>500)
функция должна определить какое количество каждой купюры необходимо выплатить исходя из числа N и вернуть результат в виде массива. -->

<form action="index.php" method="POST">
	Введите сумму выдачи:<input name="atm" type="text">
	<input type="submit">
</form>
<?php
$q=(int)$_POST['atm'];
function obmen(&$q){
	$mas=array(500,200,100,50,20,10,5,2,1);
	$mas2=array();
	foreach ($mas as $val){
     if ($q/$val >= 1)
     {

     	$mas2[]=$val;
     	$q=$q-$val;
     	obmen($q);
       	
    }
    }
    echo implode($mas2),"<br>";
	}
obmen($q);
?>
