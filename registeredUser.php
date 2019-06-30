<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="cssFile.css">
<script src="scriptFile.js"></script>
<title>Home
</title>
</head>
<body background="Background\mNAcdsd.png">
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
<br><br>
<?php 
session_start();
$getUsername = $_SESSION['user'];
?>
<h1>Hi, <?php echo $getUsername; ?> </h1>
<p>Here you will find some of the best Play Station 4 titles</p>
<div id="div1"><a href="https://www.playstation.com/en-us/" target="_blank"><img id="i" src="Background\playstation-4-logo-blueplaystation-4-launch-line-up-revealed---gaming-phanatic-d6r6ued2.png"></a></div>
</body>
</html>