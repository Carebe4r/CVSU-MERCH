<?php 
session_start();
	if(isset($_SESSION['SNO']))
	{
		unset($_SESSION['SNO']);
	}

	header("Location: index.php");
	die;