<?php
	session_start();
	$r = $_POST['ready'];
	$table = $_SESSION['table'];
	$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
	mysqli_set_charset($db, "uft8");
	$query = "UPDATE `cards_for_21_game` SET `ready_or_not` = '$r' WHERE `place_table` = '$table'";
	mysqli_query($db, $query);
	if (isset($_SESSION['host']))
	{
		if ($_SESSION['host'] =='host')
		{
			$name = $_SESSION['myName'];
			$query = "UPDATE `cards_for_21_game` SET `host` = '0' WHERE `user_name` = '$name'";
			mysqli_query($db, $query);
		}
	}
?>