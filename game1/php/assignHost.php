<?php
	session_start();

	assignHost();
	function assignHost()
	{
		$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
		$query = "SELECT `host` FROM `cards_for_21_game` WHERE `host` != '0'";
		$res = mysqli_query($db, $query);
		$userName = $_SESSION['myName'];
		if (mysqli_num_rows($res) == 0)
		{
			$_SESSION['host'] = 'host';
			$query = "UPDATE `cards_for_21_game` SET `host` = 'gameHost', `main_user` = 'main' WHERE `user_name` = '$userName'";
			$res = mysqli_query($db, $query);
			echo(' host is assigned '. 'user_name=' . $userName . ' ' . $res);
		}
	}
?>