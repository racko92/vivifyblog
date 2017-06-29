<?php 
	function getPreparedStatement($query){
    	$conn = getConnection();
    	$statement = $conn->prepare($query);
	    $statement->execute();
	    $statement->setFetchMode(PDO::FETCH_ASSOC);
	    return $statement;
	}
    function fetchAllQueryResult($statement){
	    return($statement->fetchAll());
    }
    function fetchSingleQueryResult($statement){
	    return($statement->fetch());
    }
    function fetchFromTableById($table, $id){
	    $statement = getPreparedStatement('SELECT * FROM ' .  $table . ' WHERE id =' . $id);
	    $result = fetchSingleQueryResult($statement);
	    return $result;
    }

    function fetchUserWhoPosted($post){
	    $result = fetchFromTableById('users', $post['user_id']);
	    return $result;
    }

    function fetchCommentsOnPost($post){
    	$statement = getPreparedStatement('SELECT * FROM comment WHERE post_id = ' . $post['id']);
    	$result = fetchAllQueryResult($statement);
	    return $result;
    }
 ?>