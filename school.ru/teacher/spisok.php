<html>
<title>Список заданий</title>
<head bodycolor="000011">
 <link rel="stylesheet" type="text/css" href="../css/style.css">
 <link rel="stylesheet" type="text/css" href="../css/table.css">
 <link rel="stylesheet" type="text/css" href="../css/abc.css">
 <body BACKGROUND="../image/background.PNG">
		<br><br>
		<?php
include "../common/verch1.php";
                                   
?>
<div style="color: #445C4C; font-size: 14px; margin-top: 20px"><?=$_COOKIE['teacher']?>, Добро пожаловать!</div><center>
</font><br>
<a href="../topics/html/ht1.php"><strong><font size=3 color="508068">ВЫХОД</strong></a><br><br>
<table align="center" cellspacing="0" cellpadding="0" border="0" >
<tr>
	<td colspan="2" align="center">
		<ul class="tab">
			<li><a href="sotr.php"><span>Добавление студента</span></a></li>
			<li><a href="zadan.php"><span>Переписка</span></a></li>
			<li><a href="poisk.php"><span>Поиск</span></a></li>
			<li class="active"><a href="spisok.php"><span>Архив</span></a></li>
		</ul>
 	</td>
</tr>
</table>
<table align="center" width="900" cellspacing="2" cellpadding="2" border="0" bgcolor="white">
<tr>
<td colspan="2" align="center">
<br>
<table align="center" cellspacing="2" cellpadding="2" border="0">
	<?php
		require "../db/dbconnect.php";
		$res_id4=mysql_query("SELECT * FROM `RABOTN`")
		or die(mysql_error());
		$fio=mysql_num_rows($res_id4);
	?>
	<tr>
		<h3 style="font-size: 30px; color: #508068">Проверка отчетности</h3><br><br>
		<td colspan="3" align="center"><center><font size=3 color="508068"><strong>Выберете фамилию, имя, отчество<br><br> <form method="post"><select name="1" style="width: 300px; font-size: 16px; height: 50px; padding: 10px">
			<?php
			while ($fio=mysql_fetch_row($res_id4))
			{
			echo "<option value='$fio[0]'>$fio[1]</option>\n";
			}
			?>
			<br><br> 
		</td>
	</tr>
	<tr>
		<td><center><br><input type="submit" name="send" value="Показать сообщения" class="side-button-3">
			</form><br>
		</td>
	</tr>
</table>
	<center><br>
	
	<table align="center" cellspacing="2" cellpadding="2" border="0">
	<tr>
		<td align="center"><CENTER><strong><font size=3 color="#508068">Исходящие</strong> <br>
	</center></td>
	</tr>
	<tr>
	<td><CENTER>
<?php
require "../db/dbconnect.php";
echo "<table border='1' class='table' align='center' cellspacing='1' cellpadding='1' >\n";
echo "<tr align='center' valign='middle'><th> &nbsp;Фамилия студента&nbsp; </th><th> &nbsp;Сообщение&nbsp;</th><th> &nbsp;Дата  &nbsp;<br></th></tr>\n";
$res_id1=mysql_query("SELECT `FIO` , `NAMEZ`, `DATEN`  FROM `ZADACHI`, `RABOTN` WHERE  `IDRZ`=`IDR` AND `IDR`='".$_POST['1']."' ORDER BY `FIO`");
while($prise_mas1=mysql_fetch_row($res_id1))
{
echo "<tr align='center' valign='middle'><td style='text-align: center' >$prise_mas1[0]</td><td style='text-align: center'>$prise_mas1[1]</td><td style='text-align: center'>$prise_mas1[2]</td></tr>\n";
}
?><br></td>
</tr>
</table>
<br><CENTER>
<table align="center" cellspacing="2" cellpadding="2" border="0">
<tr>
	<td><strong><font size=3 color="#508068"><CENTER>Входящие</strong> <br>
</center></td>
</tr>
<tr>
	<td><CENTER><?php
require "../db/dbconnect.php";
echo "<table border='1' class='table' align='center' cellspacing='1' cellpadding='1' >\n";
echo "<tr align='center' valign='middle'><th> &nbsp;Дата ответа&nbsp; </th><th style='width:300px'> &nbsp;Содержание&nbsp;</th></tr>\n";
$res_id2=mysql_query("SELECT `DATEOTV` , `NAMEOTV` FROM `OTVET` WHERE  `IDROTV`='".$_POST['1']."' ");
while($prise_mas2=mysql_fetch_row($res_id2))
{
echo "<tr align='center' valign='middle'><td>$prise_mas2[0]</td><td>$prise_mas2[1]</td></tr>\n";
}
?><br></td>
</tr>
</table>
</table>
	                  
        </body>     
  
</html>
