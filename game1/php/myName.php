<?php
	session_start();
	
	if (isset($_POST['myName']))
	{
		$_SESSION['host'] = '';
		$_SESSION['gameIsStarted'] = '';
		$_SESSION['iLastMain'] = 0;
		$_SESSION['currentScore'] = 0;
		$_SESSION['place_table'] = 0;
		$_SESSION['myName'] = $_POST['myName'];
		setDefault();

	}
	if (isset($_POST["gameIsStarted"]))
	{
		$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
		$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '0' WHERE `user_name` = ''";
		mysqli_query($db, $query);
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


	function setDefault()
	{
		$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
		mysqli_set_charset($db, "utf8");
		$query = "SELECT * FROM `cards_for_21_game` WHERE `host` = 'gameHost'";
		$res = mysqli_query($db, $query);
		if (mysqli_num_rows($res) == 0)
		{
			$query = "UPDATE `cards_for_21_game` SET `table_is_free` = '1',`current_score` = 0, `finished_round` = '0', `ready_or_not` = '0', `user_name` = '', `host` = '0', `main_user` = '0', `finished_turn` = '0', `total_score` = 0 ";
			mysqli_query($db, $query);
			$query = "UPDATE `cards_for_21` SET `status` = '0'";
			mysqli_query($db, $query);
		}
	}
?>