<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	$password = md5($password."qwerty");
	
	$mysql = new mysqli('localhost','root','', 'rabota');
	$mysql->query("INSERT INTO `teachers` (`login`, `password`) VALUES('$login', '$password')");
	
	setcookie('teacher', $login['login'], time() + 3600, "/");

	$mysql->close();
    
	header('Location: authTeacher.php');
?>