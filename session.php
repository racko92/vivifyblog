<?php 
	if(isset($_SESSION)){
		if(!$_SESSION['logged']){		
			header('Location: signin.php');
		}
	}

?>