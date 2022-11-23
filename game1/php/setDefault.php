<?php
	session_start();
	$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
	mysqli_set_charset($db, "uft8");
	$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '1',`current_score` = 0, `finished_round` = '0', `ready_or_not` = '0', `user_name` = '', `host` = '0', `main_user` = '0', `finished_turn` = '0', `total_score` = 0, `card_path` = 'рубашка.jpg' ";
	mysqli_query($db, $query);
	$query = "UPDATE `cards_for_21` SET `status` = '0'";
	mysqli_query($db, $query);
?>