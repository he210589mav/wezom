<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!--Написать программу(скрипт) которая передает текстовый файл из html-формы, загруженный файл помещается в каталог «uploads», если файл с таким именем уже существует, то его необходимо сохранить под другим именем. После того как файл был загружен все его содержимое нужно записать в файл «log.txt», сохранив при этом информацию которая в нем содержится. -->

<form action=file.php method=post enctype=multipart/form-data>
<input type=file name=uploadfile>
<input type=submit value=Загрузить></form>

<?php
$uploaddir='./uploads/';
$uploadfile=$_FILES['uploadfile']['name'];

if (file_exists($uploaddir.'/'.$uploadfile))
    {
    $a=date('_Y_m_d_H_i_s');;
    copy($_FILES['uploadfile']['tmp_name'], $uploaddir. "$a" . $uploadfile);
	echo "<h3>Файл существует и был переименован в $a$uploadfile </h3>";
    }
else {copy($_FILES['uploadfile']['tmp_name'], $uploaddir.'/'.$uploadfile);
    echo "<h3>Файл успешно загружен на сервер</h3>";
    }
$origfile=file_get_contents($uploaddir.'/'.$uploadfile);
$log=fopen('./uploads/log.txt','a');
fwrite($log, $origfile);
fclose($log);
?>