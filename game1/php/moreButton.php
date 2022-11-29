<?php
	session_start();
	if (!isset($_SESSION['currentScore']))
	{
		$_SESSION['currentScore'] = 0;
	}
	require 'Db/Db.php';
	$db = new Db();
	$query = "SELECT `id`, `card_path`, `value` FROM `cards_for_21` WHERE  `status` = '0'";
	$fetched = $db->returnJsonQuery($query);
	$id = round(rand(0,count($fetched)-1));
	$cardPath = $fetched[$id]['card_path'];
	$_SESSION['currentScore'] += intval($fetched[$id]["value"]);
	$currentScore = $_SESSION['currentScore'];
	$userName = $_SESSION['myName'];
	$query = "UPDATE `cards_for_21` SET  `status` = '1' WHERE `card_path` = '$cardPath'";
	$db->noReturnQuery($query);
	$query = "UPDATE `cards_for_21_game` SET `current_score` = '$currentScore', `card_path` = '$cardPath' WHERE `user_name` = '$userName'";
	$db->noReturnQuery($query);
	echo($_SESSION['currentScore'] . '_ ' . $userName . '__ ' . $_SESSION["myName"]);
?>