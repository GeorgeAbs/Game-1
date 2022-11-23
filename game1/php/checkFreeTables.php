<?php
	session_start();
	$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
	mysqli_set_charset($db, "uft8");
	$query = "SELECT * FROM `cards_for_21_game`";
	$res_query = mysqli_query($db, $query);
	$fetched = mysqli_fetch_all($res_query, MYSQLI_BOTH);
?>