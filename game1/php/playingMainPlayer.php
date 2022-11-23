<?php
	session_start();
	firstRoundFunc();
	function firstRoundFunc()
	{
		$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
		$query = "SELECT `place_table`, `main_user` FROM `cards_for_21_game` WHERE `main_user` = 'main'";
		$res = mysqli_query($db, $query);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		$resF = 'place' . $fetched[0]['place_table'] . '%%myInfo%%';
		$userName = $_SESSION['myName'];
		$query = "SELECT `main_user` FROM `cards_for_21_game` WHERE `user_name` = '$userName'";
		$res = mysqli_query($db, $query);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		$resF = $resF . $fetched[0]['main_user'];
		echo($resF);
	}

?>