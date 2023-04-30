<<?php 
session_start();
$user = isset($_POST['usuario'])?$_POST['usuario']:"";
$pass = isset($_POST['pass'])?$_POST['pass']:"";

if ($user == "juan" && $pass = "123") {
	$_SESSION['nom'] = "juan";
	header("Location: index.php");
}
else
{
	header("Location: login.php");	
}
?>