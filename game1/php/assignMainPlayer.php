<?php
	session_start();
	//print_r($_SESSION);
	if ($_SESSION['host'] =='host')
	{
		if(isset($_POST['firstRound']))
		{
			$_SESSION['gameIsStarted'] = 'started';
			$db = mysqli_connect('localhost', 'u1824956_default', 'oi4C7AUa2xYk8O5O' , 'u1824956_default') or die('Ошибка соединения с БД');
			mysqli_set_charset($db, "uft8");
			if($_POST['firstRound'] == '1')
			{
				echo('first round:   ');
			}
			
		}
	}
	
?>