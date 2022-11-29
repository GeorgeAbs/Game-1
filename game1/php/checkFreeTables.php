<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	$query = "SELECT * FROM `cards_for_21_game`";
	$fetched = returnJsonQuery($query);
?>