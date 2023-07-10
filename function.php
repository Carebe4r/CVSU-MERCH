<?php

function check_login($con) 
{
		if(isset($_SESSION['SNO']))
	{
		$id = $_SESSION['STUDENT_ID'];
		$query = "SELECT * FROM users where SNO = '$id' Limit 1";

		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("location: login.php");
	die;
}