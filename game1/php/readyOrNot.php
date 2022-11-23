<?php
	session_start();
	$r = $_POST['ready'];
	$table = $_SESSION['table'];
	$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
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