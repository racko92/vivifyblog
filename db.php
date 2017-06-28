<?php

	function dump($x){
		echo '<pre>';
		var_dump($x);
		echo '</pre>';
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vivifyblog";

	try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e)
	    {
	    	echo $e->getMessage();
	    }

	    $statement = $conn->prepare('SELECT * FROM post');
	    $statement->execute();
	    $statement->setFetchMode(PDO::FETCH_ASSOC);
	    dump($statement->fetchAll());
?>