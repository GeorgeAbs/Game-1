<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	assignHost();
	function assignHost()
	{
		$query = "SELECT `host` FROM `cards_for_21_game` WHERE `host` != '0'";
		$res = $db->returnQuery($query);
		$userName = $_SESSION['myName'];
		if (mysqli_num_rows($res) == 0)
		{
			$_SESSION['host'] = 'host';
			$query = "UPDATE `cards_for_21_game` SET `host` = 'gameHost', `main_user` = 'main' WHERE `user_name` = '$userName'";
			$res = $db->returnQuery($query);
			echo(' host is assigned '. 'user_name=' . $userName . ' ' . $res);
		}
	}
?>