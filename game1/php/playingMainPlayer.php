<?php
	session_start();
	firstRoundFunc();
	function firstRoundFunc()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
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