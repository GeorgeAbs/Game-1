<?php
	session_start();
	$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
	$query = "SELECT 
	`user_name`,
	`current_score`,
	`total_score`,
	`card_path`,
	`place_table`,
	`finished_round`
	FROM `cards_for_21_game` WHERE `user_name` != ''";
	$res = mysqli_query($db, $query);
	$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
	$result = '';
	foreach($fetched as $logArray)
	{
		foreach($logArray as $subLogArray)
		{
			$result = $result  . $subLogArray . '%newInfo%';
		}
		$result = $result  . '%newUser%';
	}
	$userName = $_SESSION['myName'];
	$query = "SELECT `card_path` FROM `cards_for_21_game` WHERE `user_name` = '$userName'";
	$res = mysqli_query($db, $query);
	$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
	$result = $result . '%%myImage%%' . $fetched[0]['card_path'] . '%%myImage%%';
	$result = $result . winnerFunc();
	echo($result);
	function winnerFunc()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
		$query = "SELECT * FROM `cards_for_21_game` WHERE `total_score` = 5";
		$res = mysqli_query($db, $query);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		return 'game is finished, winner' . $fetched[0]['user_name'] . 'game is finished, winner';
	}
?>