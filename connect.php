<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "prjct";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{

	die("Failed to connect");
}