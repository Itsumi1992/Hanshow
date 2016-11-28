<?php session_start();?><!DOCTYPE html>
<html>
<head>    <meta charset="utf-8">
	<link rel="stylesheet" href="css/frontend/style.css">	<link rel="stylesheet" href="css/bootstrap.css">	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	<script src="/Hanshow/js/bootstrap.js"></script>	<?php 	include 'config.php'; 	retry:	include (ROOT_DIR . '/function/dbconnect.php');	$conn = dbconnect();	if(!$conn){		print("DB not connected");	}	?>
</head>
<body>

<div class="header">


	</div> 
	<div class="content-container">
	<div class="login-box">	<a href="./index.php?p=login">Login</a>
	<a href="./index.php?p=registeren">Registreren</a>
</div>  
	<div class="nav">
	<ul>
	  <li class="first"><a href="./index.php">Home</a></li>
	  <li><a href="#news">News</a></li>
	  <li><a href="#contact">Contact</a></li>
	  <li style="float:right"><a class="active" href="#about">About</a></li>
	</ul>
</div>	
    <p>	<?php	if(!isset($_GET["p"]))	{		//Startpagina				include (ROOT_DIR . '/content/home.php') ;	}	elseif($_GET["p"] == "registeren")	{		//registratie pagina		include (ROOT_DIR . '/content/user_register.php') ;	}	elseif($_GET["p"] == "login")	{		//login pagina		include (ROOT_DIR . '/content/user_login.php') ;	}	?>
	<div class="footer">
		Copyright copyright inc 
	</div>

</body>
</html>
