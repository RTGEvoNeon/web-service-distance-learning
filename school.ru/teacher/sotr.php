<html>
<title>Сотрудники </title>

<head bodycolor="000011">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/abc.css">

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
						<li class="active"><a href="sotr.php"><span>Добавление студента</span></a></li>
						<li><a href="zadan.php"><span>Переписка</span></a></li>
						<li><a href="poisk.php"><span>Поиск</span></a></li>
						<li><a href="spisok.php"><span>Архив</span></a></li>
				</td>
			</tr>
		</table>
		<table align="center" width="900" cellspacing="2" cellpadding="2" border="0" bgcolor="white">
			<tr>
				<td colspan="2" align="center">
					<br><br>

					<h3 style="font-size: 30px; color: #508068">Учет студентов</h3><br><br>

					<table align="center" cellspacing="2" cellpadding="2" border="0">
						<tr>
							<td colspan="3" align="center">
								<center>
									<font size=3 color="508068"><strong>Введите фамилию, имя, отчество<br><br>
									<form method="post"><input type="text" style="width: 300px; font-size: 16px; height: 50px; padding: 10px" name="1"><br><br>
							</td>
						</tr>
						<tr>
							<td>
								<font size=3 color="508068"><strong>
										<center>Введите дату рождения<br> <br><input type="date" style="width: 150px; height: 50px; font-size: 15px; padding: 10px; text-align: center" name="2"><br><br>
							</td>
							<td width="60"></td>
							<td>
								<font size=3 color="508068"><strong>
										<center>Введите дату начала обучения<br> <br><input type="date" size="10" style="width: 150px; height: 50px; font-size: 15px; text-align: center; padding: 10px" name="3"><br><br>
							</td>
						</tr>
						<?php
						require "../db/dbconnect.php";
						$res_id3 = mysql_query("SELECT * FROM `DOLG`")
							or die(mysql_error());
						$am = mysql_num_rows($res_id3);
						?>
						<tr>
							<td colspan="3">
								<font size=3 color="508068">
									<center><strong>Выберите специальность<br><br><select name="4" style="width: 300px; height: 50px; padding: 10px; font-size: 16px; text-align: center">
												<?php
												while ($am = mysql_fetch_row($res_id3)) {
													echo "<option value='$am[0]'>$am[1]</option>\n";
												}
												?>
							</td>
						</tr>
						<?php
						require "../db/dbconnect.php";
						$res_id2 = mysql_query("SELECT * FROM `OTDEL`")
							or die(mysql_error());
						$mm = mysql_num_rows($res_id2);
						?>
						<tr>
							<td colspan="3">
								<font size=3 color="508068">
									<center><strong><br>Выберите группу<br><br><select name="5" style="width: 100px; height: 50px; padding: 10px">
												<?php
												while ($mm = mysql_fetch_row($res_id2)) {
													echo "<option value='$mm[0]'>$mm[1]</option>\n";
												}
												?>
							</td>
						</tr>
						<tr>
							<td>
								<center><br><INPUT TYPE=Reset VALUE=ОЧИСТИТЬ class="side-button-3"><br>
							</td>
							<td width="10"></td>
							<td>
								<center><br><input type="submit" name="send" value="ДОБАВИТЬ" class="side-button-3">
								</form><br>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<center><br>
									<?php
									require "../db/dbconnect.php";
									if (isset($_POST['send'])) {
										$query1 = "insert into RABOTN (FIO, BDATE, JDATE, IDDR, IDOR) values ('" . $_POST['1'] . "','" . $_POST['2'] . "','" . $_POST['3'] . "','" . $_POST['4'] . "','" . $_POST['5'] . "')";
										if (mysql_query($query1)) {
											echo "<strong>ДОБАВЛЕНО";
										} else {
											echo "Не получилось";
										}
									}
									?>
									<br>
							</td>
						</tr>

					</table>

					<?php
					require "../db/dbconnect.php";
					$res_id4 = mysql_query("SELECT * FROM `RABOTN`")
						or die(mysql_error());
					$fio = mysql_num_rows($res_id4);
					?>
					<br>
					<hr><br>
					<h3 style="font-size: 30px; color: #508068">Удаление записи</h3><br>
					<table align="center" cellspacing="2" cellpadding="2" border="0">
						<tr>
							<td align="center">
								<font color="#508068"><strong><br>
										<form method="post">
											Выберете фамилию, имя, отчество<br>
							</td>
						</tr>
						<td align="center"><br>
							<select name="6" style="width: 300px; font-size: 16px; height: 50px; padding: 10px">
								<?php
								while ($fio = mysql_fetch_row($res_id4)) {
									echo "<option value='$fio[0]'>$fio[1]</option>\n";
								}
								?>
						</td>
			</tr>
			<tr>
				<td align="center"><br><INPUT TYPE="submit" name="send1" VALUE="УДАЛИТЬ" class="side-button-3"></form><br></td>
			</tr>
		</table>

		<?php
		require "../db/dbconnect.php";
		if (isset($_POST['send1'])) {
			$query1 = "DELETE FROM RABOTN WHERE IDR='" . $_POST['6'] . "'";
			$res_id = mysql_query($query1);
			if (!$res_id) {
				echo "<h3>Ошибка запроса</h3>";
			} else if (mysql_affected_rows() < 1) {
				echo "Такой записи не обнаружено";
			} else {
				echo "Запись удалена";
			}
		}
		?>
		</table>
		<br><br><br>
</body>


</html>