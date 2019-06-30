<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Home
</title>Contacts
</head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="contactsCss.css">
<script src="scriptFile.js"></script>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a onclick="location.href = 'registeredUser.php';" href="#home">Home</a>
    <a onclick="location.href = 'action.php';" href="#action">Order</a>
	<a onclick="location.href = 'about us.php';" href="#about">About us</a>
    <a onclick="location.href = 'contacts.php';" href="#contact">Contacts</a>
	<a onclick="location.href = 'logout.php';" href="#contact">Logout</a>
  </div>
</div>

<body background="Background\mNAcdsd.png">
<div id="sprite">
	<a href="https://facebook.com" target="_blank" class="face"><img src="sprite\spriteFace.jpg" id="face"></a>
	<a href="https://linkedin.com" target="_blank" class="link"><img src="sprite\spriteLinkedIn.jpg" id="link"></a>
	<a href="https://twitter.com" target="_blank" class="twit"><img src="sprite\spriteTwit.jpg" id="twit"></a>
	<a href="https://youtube.com" target="_blank" class="you"><img src="sprite\spriteYouT.jpg" id="you"></a>
</div>
<p1 style="float: left;"><b>GGames</b></p1>
<p2 style="float: left;"><b>GGames</b></p2>
<p3 style="float: left;"><b>GGames</b></p3>
<p4 style="float: left;"><b>GGames</b></p4>
<p5 style="float: left;"><b>+1 212 321 847 05</b></p5>
</body>
</html>