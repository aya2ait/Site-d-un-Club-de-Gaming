<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "site_club";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
