<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	firstRoundFunc($db);
	function firstRoundFunc($db)
	{
		$query = "SELECT `place_table`, `main_user` FROM `cards_for_21_game` WHERE `main_user` = 'main'";
		$fetched = $db->returnJsonQuery($query);
		$resF = 'place' . $fetched[0]['place_table'] . '%%myInfo%%';
		$userName = $_SESSION['myName'];
		$query = "SELECT `main_user` FROM `cards_for_21_game` WHERE `user_name` = '$userName'";
		$fetched = $db->returnJsonQuery($query);
		$resF = $resF . $fetched[0]['main_user'];
		echo($resF);
	}

?>