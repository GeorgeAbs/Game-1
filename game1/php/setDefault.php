<?php
	session_start();
	$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
	$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '1',`current_score` = 0, `finished_round` = '0', `ready_or_not` = '0', `user_name` = '', `host` = '0', `main_user` = '0', `finished_turn` = '0', `total_score` = 0, `card_path` = 'рубашка.jpg' ";
	mysqli_query($db, $query);
	$query = "UPDATE `cards_for_21` SET `status` = '0'";
	mysqli_query($db, $query);
?>