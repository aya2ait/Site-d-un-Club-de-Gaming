<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);//fait la suppression et dirige vers acceuil
	unset($_SESSION['nom']);
	unset($_SESSION['prenom']);

}

header("Location: index.php");
die;