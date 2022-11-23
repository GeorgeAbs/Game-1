<?php
	session_start();
	$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
	$query = "SELECT * FROM `cards_for_21_game`";
	$res_query = mysqli_query($db, $query);
	$fetched = mysqli_fetch_all($res_query, MYSQLI_BOTH);
?>