<html>
<title>Список заданий</title>
<head bodycolor="000011">
<link rel="stylesheet" type="text/css" href="../css/abc.css">
 <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  
        <body BACKGROUND="../image/background.PNG">
		<br><br>
		<?php
include "../common/verch1.php";
                                   
?>
<div style="color: #445C4C; font-size: 14px; margin-top: 20px"><?=$_COOKIE['user']?>, Добро пожаловать!</div>
<center>
<br>
<a href="../topics/html/ht1.php"><strong><font size=3 color="508068">ВЫХОД</strong></a><br><br>
<table align="center" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td colspan="2" align="center">
	<ul class="tab">
        <li class="active"><a href="spisok1.php"><span>Список сообщений</span></a></li>
    <li><a href="otmetka1.php"><span>Загрузка файлов</span></a></li>
 
 		</td>
</tr>
</table>
<table align="center" width="900" cellspacing="2" cellpadding="2" border="0" bgcolor="white">
<tr>
<center>
<td colspan="2" align="center">
<br><br>
<table align="center" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td>
	<br><center><strong><font color="#508068" style="font-size: 20px; color: #508068">Входящие сообщения:</strong><br>

<?php
require "../db/dbconnect.php";

echo "<table class='table' border='1' align='center' cellspacing='1' cellpadding='1' >\n";
echo "<tr align='center' valign='middle'><th> &nbsp;Задание&nbsp;</th><th> &nbsp;Дата назначения &nbsp;<br></th></tr>\n";

if ($_COOKIE['user'] == "ilya@mail.ru") {
	$res_id=mysql_query("SELECT `NAMEZ`, `DATEN`, `DATEVN` FROM `ZADACHI` WHERE  `IDRZ`= 1");
} 
if ($_COOKIE['user'] == "ivan@mail.ru") {
	$res_id=mysql_query("SELECT `NAMEZ`, `DATEN`, `DATEVN` FROM `ZADACHI` WHERE  `IDRZ`= 2");
}
if ($_COOKIE['user'] == "kolya@mail.ru") {
	$res_id=mysql_query("SELECT `NAMEZ`, `DATEN`, `DATEVN` FROM `ZADACHI` WHERE  `IDRZ`= 3");
}
if ($_COOKIE['user'] == "denis@mail.ru") {
	$res_id=mysql_query("SELECT `NAMEZ`, `DATEN`, `DATEVN` FROM `ZADACHI` WHERE  `IDRZ`= 4");
}
if ($_COOKIE['user'] == "vika@mail.ru") {
	$res_id=mysql_query("SELECT `NAMEZ`, `DATEN`, `DATEVN` FROM `ZADACHI` WHERE  `IDRZ`= 5");
}

while($prise_mas=mysql_fetch_row($res_id))
{
echo "<tr align='center'  valign='middle'><td style='text-align: center; color:black;'>$prise_mas[0]</td><td style='text-align: center; color:black;'>$prise_mas[1]</td></tr>\n";
}
?><br>
<br>
	</td>
</tr>
</table>
<br><br>
<h3>Ответить</h3><br>

<table align="center" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td colspan="3"> <form method="post"><font size=3 color="508068"><strong><center><br>Введите текст сообщения<br> <br><input type="text"  style="width:300px; padding: 10px; height:50px" name="2"><br><br> </td>
		</tr>
<tr>
	</tr>
<tr>
	<td ><center><br><INPUT TYPE=Reset VALUE=ОЧИСТИТЬ class="side-button-3"><br></td>
		<td width="10"></td>
	<td ><center><br><input type="submit" name="send" value="ОТПРАВИТЬ" class="side-button-3">
</form><br></td>
</tr>
	<tr>
	<td width="40px"></td>
<td style="text-align: center">
<?php
require "../db/dbconnect.php";
$today = date("Y-m-d H:i:s");
if(isset($_POST['send']))
{
	if ($_COOKIE['user'] == "ilya@mail.ru") {
		$query1="insert into OTVET (NAMEOTV, IDROTV, DATEOTV) values ('".$_POST['2']."', 1, '$today')";
	} 
	if ($_COOKIE['user'] == "ivan@mail.ru") {
		$query1="insert into OTVET (NAMEOTV, IDROTV, DATEOTV) values ('".$_POST['2']."', 2, '$today')";
	}
	if ($_COOKIE['user'] == "kolya@mail.ru") {
		$query1="insert into OTVET (NAMEOTV, IDROTV, DATEOTV) values ('".$_POST['2']."', 3, '$today')";
	}
	if ($_COOKIE['user'] == "denis@mail.ru") {
		$query1="insert into OTVET (NAMEOTV, IDROTV, DATEOTV) values ('".$_POST['2']."', 4, '$today')";
	}
	if ($_COOKIE['user'] == "vika@mail.ru") {
		$query1="insert into OTVET (NAMEOTV, IDROTV, DATEOTV) values ('".$_POST['2']."', 5, '$today')";
	}

if(mysql_query($query1))
{
echo "<div style='text-align=center'><strong>ДОБАВЛЕНО</div>";
}
else
{
echo "Не получилось";   
}
}                                        
?>
<br></td>
</tr>
</table>
</td>
</tr>
</table>
</table>	                  
        </body>     
  
</html>
