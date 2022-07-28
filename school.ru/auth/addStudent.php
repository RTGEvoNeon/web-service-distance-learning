<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$fio = filter_var(trim($_POST['fio']), FILTER_SANITIZE_STRING);

	$password = md5($password."qwerty");
	
	$mysql = new mysqli('localhost','root','', 'rabota');
    $result = $mysql->query("SELECT * FROM `rabotn` WHERE `fio` = '$fio'");
    $count = mysqli_num_rows($result); 
    $user = $result->fetch_assoc();

    if ($count != 0) {
        $mysql->query("INSERT INTO `users` (`login`, `password`, `FIOU`) VALUES('$login', '$password', '$fio')");
    } 

    setcookie('user', $user['login'], time() + 3600, "/");

	$mysql->close();
    header('Location: authStudent.php');
?>