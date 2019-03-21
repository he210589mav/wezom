<?php
header('Content-Type: text/html; charset=utf-8');
$DB_HOST='localhost';
$DB_LOGIN='root';
$DB_PASSWORD='';
$DB_NAME='gbook';
$name = $_POST['name'];
$text = $_POST['msg'];
$email= $_POST['email'];
$link = mysqli_connect("$DB_HOST", "$DB_LOGIN", "$DB_PASSWORD", "$DB_NAME");
    if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL,"<br>";
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL,"<br>";
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL,"<br>";
    exit;
}
echo "Соединение с MySQL установлено!" . PHP_EOL,"<br>";
?>

<h3>Оставьте запись в нашей Гостевой книге</h3>
<form method="post" action="gbook.inc.php">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />
<br />
<input type="submit" value="Отправить!" />
</form>

<?php
$result = mysqli_query($link, "INSERT INTO `msgs` (`id`, `name`, `email`, `msg`, `datetime`) VALUES (NULL, '$name', '$email', '$text', CURRENT_TIMESTAMP)");  
    if ($result == true){
    echo "Информация занесена в базу данных","<br>";
    }
    else{
    echo "Информация не занесена в базу данных","<br>";
    }
$result2 = mysqli_query($link, "SELECT * FROM `msgs`");
$num_rows = mysqli_num_rows($result2);
echo "Количество записей в гостевой книге $num_rows \n";
    while ($result3 = mysqli_fetch_assoc($result2)) {
	echo "<p>";
	echo implode ("<br>",$result3);
    ?>
    <form method="post" action="gbook.inc.php">
    <input type="submit" name="del" value="Удалить запись" />
    </form>
    <?php
	echo "</p>";
  }
 
?>

