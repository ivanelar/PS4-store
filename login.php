<?php
session_start();
require_once("dbcontroller.php");
$con = new DBController();

if(isset($_POST['button1'])) {

$userName = $_POST["userName"];
$_SESSION['user'] = $userName;
$userPass = $_POST["pass"];
$tmpName = true;
$tmpPass = true;

$user_array = $con->runQuery("SELECT username FROM `user`");
	if (!empty($user_array)) { 
		foreach($user_array as $value){
			if($value == $userName){
			$tmpName = false;
		}
	}
}
			
$pass_array = $con->runQuery("SELECT username FROM `user`");
	if (!empty($pass_array)) { 
		foreach($pass_array as $value){
			if($value == $userPass){
			$tmpName = false;
		}
	}
}


if($tmpName == true && $tmpPass == true){
	header('Location: registeredUser.php');
	exit;
}else{
	header('Location: login.html');
	exit;
}


}

?>