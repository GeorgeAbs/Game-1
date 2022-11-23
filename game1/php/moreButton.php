<?php
	session_start();
	if (!isset($_SESSION['currentScore']))
	{
		$_SESSION['currentScore'] = 0;
	}
	$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
	$query = "SELECT `id`, `card_path`, `value` FROM `cards_for_21` WHERE  `status` = '0'";
	$res = mysqli_query($db, $query);
	$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
	$id = round(rand(0,count($fetched)-1));
	$cardPath = $fetched[$id]['card_path'];
	$_SESSION['currentScore'] += intval($fetched[$id]["value"]);
	$currentScore = $_SESSION['currentScore'];
	$userName = $_SESSION['myName'];
	$query = "UPDATE `cards_for_21` SET  `status` = '1' WHERE `card_path` = '$cardPath'";
	mysqli_query($db, $query);
	$query = "UPDATE `cards_for_21_game` SET `current_score` = '$currentScore', `card_path` = '$cardPath' WHERE `user_name` = '$userName'";
	mysqli_query($db, $query);
	echo($_SESSION['currentScore'] . '_ ' . $userName . '__ ' . $_SESSION["myName"]);
?>