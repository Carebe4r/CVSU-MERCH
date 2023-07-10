<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cvsumerch";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{

	die("Failed to connect");
}