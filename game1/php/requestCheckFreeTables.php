<?php
	session_start();
	$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
	mysqli_set_charset($db, "uft8");
	$query = "SELECT `place_table` FROM `cards_for_21_game` WHERE `table_is_free` = '1' ";
	$res_query = mysqli_query($db, $query);
	$fetched = mysqli_fetch_all($res_query, MYSQLI_ASSOC);
	foreach($fetched as $logArray)
	{
		foreach($logArray as $subLogArray)
		{
			$result = $result . '%info%' . $subLogArray;
		}
	}
	$result = $result . '%info%';
	echo($result);
?>