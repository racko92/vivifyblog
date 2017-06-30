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
    function deletePost($id){
        $conn = getConnection();
        $statement = $conn->exec('DELETE FROM post WHERE id=' . $id);
    }
    function addPost($title, $user, $text, $category, $date){
        $conn = getConnection();
        $statement = $conn->exec('INSERT INTO post (title, user_id, text, category_id, created_at) VALUES (\'' . $title . '\',' .  $user . ',\'' . $text . '\',' .  $category . ',' . $date . ')');
    }
    function addComment($post, $comment, $user, $date){
        $conn = getConnection();
        $statement = $conn->exec('INSERT INTO comment (post_id, text, user_id, created_at) VALUES (' . $post . ',\'' . $comment . '\',' . $user . ',' . $date . ')');
    }
    function registerUser($name, $email, $password){
        $conn = getConnection();
        $statement = $conn->exec('INSERT INTO users (email, name, password) VALUES (\'' . $email . '\', \'' . $name . '\', \'' . $password . '\');');

    }
    function pagination($rows){
        $statement = getPreparedStatement('SELECT * FROM post ORDER BY id OFFSET ' . $rows . ' ROWS');
        $result = fetchAllQueryResult($statement);
        return $result;
    }
 ?>