<?php
	session_start();
	//print_r($_SESSION);
	if ($_SESSION['host'] =='host')
	{
		if(isset($_POST['firstRound']))
		{
			$_SESSION['gameIsStarted'] = 'started';
			if($_POST['firstRound'] == '1')
			{
				echo('first round:   ');
			}
			
		}
	}
	
?>