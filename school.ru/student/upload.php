<html>
<title>Сотрудники </title>

<head bodycolor="000011">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

<body BACKGROUND="../image/background.PNG">
  <br><br>
  <?php
  include "../common/verch.php";

  ?>
  <div style="color: #445C4C; font-size: 14px; margin-top: 20px"><?=$_COOKIE['user']?>, Добро пожаловать!</div>
  <br>
  <center>
    </font>
    <center>
      </font>
      </font><br>
      <a href="../topics/html/ht1.php"><strong>
          <font size=3 color="008000">ВЫХОД
        </strong></a><br><br>
      <strong><?= $_COOKIE['user'] ?>, Добро пожаловать!</strong><br><br>
      <table align="center" cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td colspan="2" align="center">
            <ul class="tab">
              <li><a href="spisok1.php"><span>Список заданий</span></a></li>
              <li class="active"><a href="otmetka1.php"><span>Отметка о выполнении</span></a></li>
          </td>
        </tr>
      </table>
      <br><br>
</body>

</html>