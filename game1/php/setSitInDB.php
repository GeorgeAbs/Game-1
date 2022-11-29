<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	$but = $_POST["butClass"];
	$place = 0;
	$name = $_SESSION['myName'];
	if ($but == '.butPlace1') {$place = 1; $_SESSION["tableClass"] = '.place1';}
	if ($but == '.butPlace2') {$place = 2; $_SESSION["tableClass"] = '.place2';}
	if ($but == '.butPlace3') {$place = 3; $_SESSION["tableClass"] = '.place3';}
	if ($but == '.butPlace4') {$place = 4; $_SESSION["tableClass"] = '.place4';}
	$_SESSION["table"] = $place;
	$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '0', `user_name` = '$name' WHERE `place_table` = '$place'";
	$db->noReturnQuery($query);
?>