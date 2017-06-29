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

    function fetchUserWhoPosted($post){
	    $result = fetchRelatedRow('users', $post['user_id']);
	    return $result;
    }

    function fetchAllFromTable($table){
        $statement = getPreparedStatement('SELECT * FROM ' . $table . ';');
        $result = fetchAllQueryResult($statement);
        return $result;
    }
    function fetchAllPosts(){
        $statement = fetchAllFromTable('post');
        return $statement;
    }
 ?>