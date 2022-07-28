<html>
<title>Поиск</title>

<head bodycolor="000011">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/abc.css">
	<link rel="stylesheet" type="text/css" href="../css/table.css">

<body BACKGROUND="../image/background.PNG">
	<br><br>
	<?php
	include "../common/verch1.php";

	?>

<div style="color: #445C4C; font-size: 14px; margin-top: 20px"><?=$_COOKIE['teacher']?>, Добро пожаловать!</div>	<center>
		</font><br>
		<a href="../topics/html/ht1.php"><strong>
				<font size=3 color="508068">ВЫХОД
			</strong></a><br><br>
		<table align="center" cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td colspan="2" align="center">
					<ul class="tab">
						<li><a href="sotr.php"><span>Добавление студента</span></a></li>
						<li><a href="zadan.php"><span>Переписка</span></a></li>
						<li class="active"><a href="poisk.php"><span>Поиск</span></a></li>
						<li><a href="spisok.php"><span>Архив</span></a></li>
				</td>
			</tr>
		</table>
		<?php
		require "../db/dbconnect.php";
		$res_id1 = mysql_query("SELECT * FROM `RABOTN`")
			or die(mysql_error());
		$fio = mysql_num_rows($res_id1);
		$res_id2 = mysql_query("SELECT * FROM `STATUS`")
			or die(mysql_error());
		$st = mysql_num_rows($res_id2);
		?>
		<table align="center" width="900" cellspacing="2" cellpadding="2" border="0" bgcolor="white">
			<tr>
				<td colspan="2" align="center">
					<br><br>
					<h3 style="font-size: 30px; color: #508068">Проверка отчетности</h3><br><br>

					<table align="center" cellspacing="2" cellpadding="2" border="0">
						<tr>
							<td align="center">
								<font color="508068"><strong><br>
										<form method="post">
											Выберите фамилию, имя, отчество<br><br>
											<select name="1" style="width: 300px; height: 50px; font-size: 15px; padding: 10px; text-align: center">
												<?php
												while ($fio = mysql_fetch_row($res_id1)) {
													echo "<option value='$fio[0]'>$fio[1]</option>\n";
												}
												?><br>
							</td>
							<td width="40"></td>
							<td align="center">
								<font color="508068"><strong><br>
										Введите дату <br><br><input type="date" size="10" name="2" style="width: 150px; height: 50px; font-size: 15px; padding: 10px; text-align: center"><br>
							</td>
							<td width="40"></td>

						</tr>
						<tr>
							<td align="center" colspan="5"><br><INPUT TYPE="submit" name="send1" VALUE="ПРОСМОТРЕТЬ" class="side-button-3"></form><br></td>
						</tr>
					</table>
					<?php
					require "../db/dbconnect.php";
					echo "<table class='table' border='1' 'align='center' cellspacing='1' cellpadding='1' >\n";
					echo "<tr align='center' valign='middle'><th> &nbsp;Фамилия студента&nbsp; </th><th> &nbsp;Сообщение&nbsp;</th><th> &nbsp;Дата сообщения &nbsp;<br></th></tr>\n";
					$res_id = mysql_query("SELECT `FIO` , `NAMEZ`, `DATEN` FROM `ZADACHI`, `RABOTN`  WHERE  '" . $_POST['1'] . "'=`IDRZ` AND  `DATEN` LIKE '%" . $_POST['2'] . "%' AND `IDRZ`=`IDR`  ORDER BY `FIO`");
					while ($prise_mas = mysql_fetch_row($res_id)) {
						echo "<tr align='center' valign='middle'><td style='text-align: center'>$prise_mas[0]</td><td style='text-align: center'>$prise_mas[1]</td><td >$prise_mas[2]</td></td></tr>\n";
					}
					?><br>
		</table>
		<br>
		<br>
</body>

</html>