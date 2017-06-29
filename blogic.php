<?php 
	function getPreparedStatement($query){
    	$conn = getConnection();
    	$statement = $conn->prepare($query);
	    $statement->execute();
	    $statement->setFetchMode(PDO::FETCH_ASSOC);
	    return $statement;
	}
    function fetchAllQueryResult($statement){
        $result = $statement->fetchAll();
        return $result;
    }
    function fetchSingleQueryResult($statement){
        $result = $statement->fetch();
	    return $result;
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

    function fetchRowsRelatedToRow($table, $row, $id){
        $statement = getPreparedStatement('SELECT * FROM ' . $table . ' WHERE ' . $row . ' = ' . $id);
        $result = fetchAllQueryResult($statement);
        return $result;
    }

 ?>