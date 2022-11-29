<?php
	session_start();
	require 'Db/Db.php';
	$db = new Db();
	if (isset($_POST['myName']))
	{
		$_SESSION['host'] = '';
		$_SESSION['gameIsStarted'] = '';
		$_SESSION['iLastMain'] = 0;
		$_SESSION['currentScore'] = 0;
		$_SESSION['place_table'] = 0;
		$_SESSION['myName'] = $_POST['myName'];
		setDefault($db);

	}
	if (isset($_POST["gameIsStarted"]))
	{
		$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '0' WHERE `user_name` = ''";
		$db->noReturnQuery($query);
		$query = "SELECT `place_table` FROM `cards_for_21_game` WHERE `user_name` = ''";
		$fetched = mysqli_fetch_all(mysqli_query($db, $query), MYSQLI_ASSOC);
		$result = '';
		//$resultForSQL = '';
		foreach($fetched as $logArray)
		{
			foreach($logArray as $subLogArray)
			{
				$result = $result  . $subLogArray . '%info%';
			}
		}
		$arr = explode("%info%", $result);
		$_SESSION['playingTables'] = $arr;
		echo($result);
	}


	function setDefault($db)
	{
		$query = "SELECT * FROM `cards_for_21_game` WHERE `host` = 'gameHost'";
		$res = $db->returnQuery($query);
		if (mysqli_num_rows($res) == 0)
		{
			$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '1',`current_score` = 0, `finished_round` = '0', `ready_or_not` = '0', `user_name` = '', `host` = '0', `main_user` = '0', `finished_turn` = '0', `total_score` = 0 ";
			$db->noReturnQuery($query);
			$query = "UPDATE `cards_for_21` SET `status` = '0'";
			$db->noReturnQuery($query);
		}
	}
?>