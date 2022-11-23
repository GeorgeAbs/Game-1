<?php
	session_start();
	//print_r($_SESSION);
	if ($_SESSION['host'] =='host')
	{
		if(isset($_POST['firstRound']))
		{
			$_SESSION['gameIsStarted'] = 'started';
			$db = mysqli_connect('127.0.0.1', 'root', '', 'myDB');
			mysqli_set_charset($db, "utf8");
			if($_POST['firstRound'] == '1')
			{
				echo('first round:   ');
			}
			
		}
	}
	
?>