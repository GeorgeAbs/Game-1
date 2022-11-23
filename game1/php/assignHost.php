<?php
	session_start();

	assignHost();
	function assignHost()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
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