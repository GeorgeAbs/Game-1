<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	$query = "SELECT `place_table` FROM `cards_for_21_game` WHERE `table_is_free` = '1' ";
	$fetched = $db->returnJsonQuery($query);
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