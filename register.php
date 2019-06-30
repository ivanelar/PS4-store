<?php
session_start();
require_once("dbcontroller.php");
$con = new DBController();

if(isset($_POST['button1'])) {

$mySQL = mysqli_connect("localhost", "root", "", "gamecenter");
$num = "SELECT uniCode FROM `user`";
$result = $mySQL->query($num);
$code = $result->num_rows + 1;

$userName = $_POST["userName"];
$_SESSION['user'] = $userName;
$userPass = $_POST["pass"];
$email = $_POST["email"];

$tmpName = true;

$user_array = $mySQL->query("SELECT username FROM `user`"); 
		while($row=mysqli_fetch_assoc($user_array)){
			if($row["username"] == $userName){
			$tmpName = false;
		}
	}


if($tmpName == true){
	$sql = "INSERT INTO `user` (`username`, `pass`, `email`, `uniCode`)

	VALUES ('$userName', '$userPass', '$email', '$code')";
	
	if ($mySQL->query($sql) === TRUE) {
	header('Location: registeredUser.php');
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $mySQL->error;
}
	
}else{
	header('Location: register.html');
	exit;
}

}

?>