<?php
	session_start(); 
	include 'db.php';
	include 'blogic.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vivify Blog</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<h1 class="logo">Vivify<span class="logodark">blog</span></h1>
	<nav>
		
		<a href="index.php">HOME</a>
		<a href="about.php">ABOUT</a>
		<a href="contact.php">CONTACT</a>
		<?php 

			
			if(array_key_exists('logged', $_SESSION)){
				if($_SESSION['logged'] == true){
					echo '<a href="index.php?logout=true">SIGN OUT</a>';
				}
			}
			else{

				echo '<a href="signin.php">SIGN IN</a>';
			}
		
		?>
	
	</nav>
</header>