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
        <br>
        <div style="color: #445C4C; font-size: 14px; margin-top: 20px"><?=$_COOKIE['user']?>, Добро пожаловать!</div>
        <center>
                </font>
                <center>
                        </font>
                        </font><br>
                        <a href="../topics/html/ht1.php"><strong>
                                        <font size=3 color="508068">ВЫХОД
                                </strong></a><br><br>
                        <table align="center" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                        <td colspan="2" align="center">
                                                <ul class="tab">
                                                        <li><a href="spisok1.php"><span>Список заданий</span></a></li>
                                                        <li class="active"><a href="otmetka1.php"><span>Загрузка файлов</span></a></li>
                                        </td>
                                </tr>
                        </table>
                        <table align="center" width="900" cellspacing="2" cellpadding="2" border="0" bgcolor="white">
                                <tr>
                                        <center>
                                                <td colspan="2" align="center">
                                                        <br>
                                                        <table align="center" cellspacing="2" cellpadding="2" border="0">
                                                                <tr>
                                                                        <td align="center">
                                                                                <?php
                                                                                if (isset($_SESSION['message']) && $_SESSION['message']) {
                                                                                        printf('<b>%s</b>', $_SESSION['message']);
                                                                                        unset($_SESSION['message']);
                                                                                }
                                                                                ?>
                                                                                <form action="loadFile.php" method="post" enctype="multipart/form-data">
                                                                                        <div>
                                                                                                <span>Выберите файл:</span><br><br>
                                                                                                <input type="file" id="fl" name="fl" />
                                                                                        </div>
                                                                                        <input type="submit" value="Загрузить" class="side-button-3" />
                                                                                </form>
                                                                        </td>
                                                                </tr>
                                                        </table>

                                                </td>
                                </tr>
                        </table>
                        <br>
                        <br>
                        <br>
</body>

</html>