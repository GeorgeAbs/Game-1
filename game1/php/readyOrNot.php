<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	$r = $_POST['ready'];
	$table = $_SESSION['table'];
	$query = "UPDATE `cards_for_21_game` SET `ready_or_not` = '$r' WHERE `place_table` = '$table'";
	$db->noReturnQuery($query);
	if (isset($_SESSION['host']))
	{
		if ($_SESSION['host'] =='host')
		{
			$name = $_SESSION['myName'];
			$query = "UPDATE `cards_for_21_game` SET `host` = '0' WHERE `user_name` = '$name'";
			$db->noReturnQuery($query);
		}
	}
?>