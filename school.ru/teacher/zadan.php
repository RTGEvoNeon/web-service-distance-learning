<html>
<title>Переписка</title>
<head bodycolor="000011">
 <link rel="stylesheet" type="text/css" href="../css/style.css">
 <link rel="stylesheet" type="text/css" href="../css/abc.css">

 <body BACKGROUND="../image/background.PNG">
		<br><br>
		<?php
include "../common/verch1.php";
                                   
?>
<div style="color: #445C4C; font-size: 14px; margin-top: 20px"><?=$_COOKIE['teacher']?>, Добро пожаловать!</div>
<center>
</font><br>
<a href="../topics/html/ht1.php"><strong><font size=3 color="508068">ВЫХОД</strong></a><br><br>
<table align="center" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td colspan="2" align="center">
	<ul class="tab">
		<li><a href="sotr.php"><span>Добавление студента</span></a></li>
		<li class="active"><a href="zadan.php"><span>Переписка</span></a></li>
		<li><a href="poisk.php"><span>Поиск</span></a></li>
		<li><a href="spisok.php"><span>Архив</span></a></li>
	</ul>
 	</td>
</tr>
</table>
<?php
	require "../db/dbconnect.php";
$res_id4=mysql_query("SELECT * FROM `RABOTN`")
or die(mysql_error());
$fio=mysql_num_rows($res_id4);
?>
<table align="center" width="900" cellspacing="2" cellpadding="2" border="0" bgcolor="white">
<tr>
<td colspan="2" align="center">
<br><br>
<h3 style="font-size: 30px; color: #508068">Отправка сообщения</h3><br><br>

<table align="center" cellspacing="2" cellpadding="2" border="0">
	<tr>
		<td colspan="3" align="center"> <center><font size=3 color="508068"><strong>Выберете фамилию, имя, отчество<br><br> <form method="post"><select name="1" style="width: 300px; padding: 10px; font-size: 16px; height: 50px; padding: 10px">
		<?php
		while ($fio=mysql_fetch_row($res_id4))
		{
		echo "<option value='$fio[0]'>$fio[1]</option>\n";
		}
		?><br><br> </td>
	</tr>
	<tr>
		<td colspan="3"> <font size=3 color="508068"><strong><center><br>Введите текст сообщения<br> <br><input type="textarea" style="width: 300px; height: 50px; padding: 10px"name="2"><br><br> </td>
			</tr>
	<tr>
		<td colspan="3"> <font size=3 color="508068"><strong><center>Введите дату <br> <br><input type="date" name="3" style="width: 150px; height: 50px; font-size: 15px; padding: 10px; text-align: center"><br><br></td>
	<td width="40"></td>
		
		</tr>
	<tr>
		<td ><center><br><INPUT TYPE=Reset VALUE=ОЧИСТИТЬ class="side-button-3"><br></td>
			<td width="10"></td>
		<td><center><br><input type="submit" name="send" value="ОТПРАВИТЬ" class="side-button-3">
	</form><br></td>
	</tr>
		<tr>
	<td colspan="3"><center><br>
	<?php
	require "../db/dbconnect.php";
	if(isset($_POST['send']))
	{
	$query1="insert into ZADACHI (IDRZ, NAMEZ, DATEN, DATEVN) values ('".$_POST['1']."','".$_POST['2']."','".$_POST['3']."','".$_POST['4']."')";
	if(mysql_query($query1))
	{
	echo "<strong>ДОБАВЛЕНО";
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
<br><hr>
</table>
</td>
</tr>               
</body>     
</html>
