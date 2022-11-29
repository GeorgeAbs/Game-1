<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	$query = "SELECT 
	`user_name`,
	`current_score`,
	`total_score`,
	`card_path`,
	`place_table`,
	`finished_round`
	FROM `cards_for_21_game` WHERE `user_name` != ''";
	$fetched = $db->returnJsonQuery($query);
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
	$fetched = $db->returnJsonQuery($query);
	$result = $result . '%%myImage%%' . $fetched[0]['card_path'] . '%%myImage%%';
	$result = $result . winnerFunc($db);
	echo($result);
	function winnerFunc($db)
	{
		$query = "SELECT * FROM `cards_for_21_game` WHERE `total_score` = 5";
		$fetched = $db->returnJsonQuery($query);
		return 'game is finished, winner' . $fetched[0]['user_name'] . 'game is finished, winner';
	}
?>