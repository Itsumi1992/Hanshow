<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>
  
  <body>
  <!--inhoud-->
    <p>
	<?php
	if(!isset($_GET["p"]))
	{
		print("startpagina");
		//Startpagina
	}
	elseif($_GET["p"] == "registeren")
	{
		//registratie
		include '/content/user_register.php' ;
	}
	?>
	</p>
  </body>
</html>