<?php
	session_start();
	$_SESSION['currentScore'] = 0;
	$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
	mysqli_set_charset($db, "uft8");
	$myName = $_SESSION['myName'];
	print_r($_SESSION);
	if (isset($_POST['more21']))
	{
		$query = "SELECT * FROM `cards_for_21_game` WHERE `user_name` = '$myName'";
		$res = mysqli_query($db, $query);
		echo('myName finishRoundMore21=' . $myName);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		$totalScore = $fetched[0]['total_score'];
		$fetched[0]['total_score'] == 0 ? $totalScore = 0 : $totalScore--;
		$placeTable = $fetched[0]['place_table'];
		$query = "UPDATE `cards_for_21_game` SET  `total_score` = '$totalScore' WHERE `place_table` = '$placeTable'";
		$res = mysqli_query($db, $query);
	}
	if (isset($_POST['equal21']))
	{
		$query = "SELECT * FROM `cards_for_21_game` WHERE `user_name` = '$myName'";
		$res = mysqli_query($db, $query);
		echo('myName finishRoundEqual21=' . $myName);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		$totalScore = $fetched[0]['total_score'] + 1;
		$placeTable = $fetched[0]['place_table'];
		$query = "UPDATE `cards_for_21_game` SET  `total_score` = '$totalScore' WHERE `place_table` = '$placeTable'";
		$res = mysqli_query($db, $query);
		$query = "UPDATE `cards_for_21_game` SET `main_user` = 'main' WHERE `user_name` != '' LIMIT 1";
		echo(' _place_table=' . $placeTable);
		$res = mysqli_query($db, $query);
		$query = "UPDATE `cards_for_21_game` SET `finished_round` = '0', `current_score` = 0 WHERE `user_name` != ''";
		$res = mysqli_query($db, $query);
	}
	$query = "UPDATE `cards_for_21_game` SET  `finished_round` = '1' WHERE `user_name` = '$myName'";
	$res = mysqli_query($db, $query);

	if (summaryFunc() == false && !isset($_POST['more21']) && !isset($_POST['equal21']))
	{
		if (roundsFunc() == false)
		{
			setMain();
		}
		else
		{
			$query = "UPDATE `cards_for_21` SET `status` = '0'";
			mysqli_query($db, $query);
			$query = "UPDATE `cards_for_21_game` SET  `main_user` = '0'";
			echo('___roundsFunc true___');
			$res = mysqli_query($db, $query);
			ifRoundIsFinishedFunc();
			if (summaryFunc() == false)
			{
				$query = "UPDATE `cards_for_21_game` SET `main_user` = 'main', `card_path` = 'side.jpg' WHERE `user_name` != '' LIMIT 1";
				echo(' _place_table=' . $placeTable);
				$res = mysqli_query($db, $query);
				$query = "UPDATE `cards_for_21_game` SET `finished_round` = '0', `current_score` = 0 WHERE `user_name` != ''";
				$res = mysqli_query($db, $query);
			}
			else
			{
				winnerFunc();
			}
		}
	}
	else
	{
		winnerFunc();
	}
	
	function setMain()
	{
		echo('_setMain func_');
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
		$query = "SELECT * FROM `cards_for_21_game` WHERE `user_name` != ''";
		$res = mysqli_query($db, $query);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		$placeTableMain = '';
		$bool = false;
		$i = 0;
		
		while($i < count($fetched) && $bool != true)
		{
			if ($fetched[$i]['main_user'] == 'main')
			{
				echo('_found main  ' . $fetched[$i]['user_name'] . '_');
				echo('_'.$i.'_');
				$placeTableMain = $fetched[$i]['place_table'];
				$query = "UPDATE `cards_for_21_game` SET `main_user` = '0' WHERE `place_table` = '$placeTableMain'";
				$res = mysqli_query($db, $query);
				if ($i = count($fetched) - 1)
					{$i = 0;}
				else{ $i++;}
				echo('_'.$i.'_');
				echo('_'.count($fetched).'_');
				echo('_'.!$bool.'_');
				while ($i < count($fetched))
				{
					if ($fetched[$i]['finished_round'] == '0')
					{
						echo('_found 0 round 0 turn_');
						$placeTableMain = $fetched[$i]['place_table'];
						echo('_placeTable_' . $placeTableMain);
						$query = "UPDATE `cards_for_21_game` SET `main_user` = 'main' WHERE `place_table`= '$placeTableMain'";
						$res = mysqli_query($db, $query);
						$bool = true;
						$_SESSION['iLastMain'] = $i + 1;
						$_SESSION['place_table'] = $placeTableMain;
						break;
					}
					$i++;
				}
			}
			$i++;
		}
	}
	function summaryFunc()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
		$result = false;
		$query = "SELECT * FROM `cards_for_21_game` WHERE `total_score` = 5";
		$res = mysqli_query($db, $query);
		if (mysqli_num_rows($res) > 0) //game is over
			$result = true;
		return $result;
	}
	function roundsFunc()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
		$result = false;
		$query = "SELECT * FROM `cards_for_21_game` WHERE `finished_round` = '0' AND `user_name` != ''";
		$res = mysqli_query($db, $query);
		echo('roundsFunc rows=' . mysqli_num_rows($res));
		if (mysqli_num_rows($res) == 0) //turn is over
			$result = true;
		return $result;
	}
	function ifRoundIsFinishedFunc()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
		$query = "SELECT * FROM `cards_for_21_game` WHERE `user_name` != ''";
		$res = mysqli_query($db, $query);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		$iC = 0;
		$curScoreForCompare = -1;
		$roundWinner = 0;
		$totalScore = 0;
		while ($iC < count($fetched))
		{
			if ($fetched[$iC]['current_score'] == 21)
			{

				$totalScore = $fetched[$iC]['total_score'] + 1;
				$placeTable = $fetched[$iC]['place_table'];
				$query = "UPDATE `cards_for_21_game` SET  `total_score` = '$totalScore' WHERE `place_table` = '$placeTable'";
				$res = mysqli_query($db, $query);
				echo(' 21 points, table=' . $placeTable . ' totScore=' . $totalScore);
				return;
			}
			echo($curScoreForCompare . ' searchForWinner ' . $roundWinner . 'i ' . $iC . 'counyFetched ' . count($fetched));
			if ($fetched[$iC]['current_score'] < 21)
			{
				echo($curScoreForCompare . ' searchForWinner ' . $roundWinner . 'i ' . $iC);
				if ($fetched[$iC]['current_score'] > $curScoreForCompare)
				{
					$curScoreForCompare = $fetched[$iC]['current_score'];
					$roundWinner = $fetched[$iC]['place_table'];
					$totalScore = $fetched[$iC]['total_score'];
				}
			}
			$iC++;
			if ($iC == count($fetched))
			{
				$totalScore += 1;
				$query = "UPDATE `cards_for_21_game` SET  `total_score` = '$totalScore' WHERE `place_table` = '$roundWinner'";
				$res = mysqli_query($db, $query);
				echo('roundWinner='.$roundWinner);
			}
		}
	}
	function winnerFunc()
	{
		$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
		mysqli_set_charset($db, "uft8");
		$query = "SELECT * FROM `cards_for_21_game` WHERE `total_score` = 5";
		$res = mysqli_query($db, $query);
		$fetched = mysqli_fetch_all($res, MYSQLI_ASSOC);
		echo('game is finished, winner' . $fetched[0]['user_name'] . 'game is finished, winner');
	}
?>