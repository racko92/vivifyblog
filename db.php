<?php

	function dump($x){
		echo '<pre>';
		var_dump($x);
		echo '</pre>';
	}

    function getConnection(){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "vivifyblog";

		try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    return $conn;
		    }
		catch(PDOException $e)
		    {
		    	echo $e->getMessage();
		    }
    }
?>