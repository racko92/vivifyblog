<?php 
	include 'session.php';
	include 'header.php'; 
?>
<main>
	<section class="mainContainer">
		<?php
				$post = fetchFromTableById('post', $_GET['id']);
				$user = fetchFromTableById('users', $post['user_id']);
				$category = fetchFromTableById('category', $post['category_id']);
				echo "<h1>" . $post['title'] . "</h1>";
				echo "<h3>Category: " . $category['name'] . "</h3>";
				echo "<h4 class=\"postedBy\">Posted on: " . $post['created_at'] . " by " . $user['name'] . "</h4>";
				echo "<p class=\"postContent\">" . $post['text'] . "</p>";
		 ?>
	</section>
	<section class="comment">
	<h2>Comments: </h2>
	<?php
			$userPosted = fetchUserWhoPosted($post);
			$comments = fetchRowsRelatedToRow('comment', 'post_id', $post['id']);
			foreach($comments as $value){
				$userCommented = fetchFromTableById('users', $value['user_id']);
				echo '<h4 class="comentedBy">' . $value['created_at'] .  ' by ' . $userCommented['name'] . '</h4>';
				echo '<p>' . $value['text'] . '</p>';
			}
	?>
	</section>
	<form class="postComment" method="post">
		<textarea class="commentArea" placeholder="Write your comment" name="text"></textarea>
			<div class="buttons">
				<button value="submit" name="submit">Comment</button>
			</div>	
	</form>

	<?php 
		if(array_key_exists('user', $_SESSION)){
			if(!empty($_POST['submit'])){
				if(!empty($_POST['text'])){
					addComment($post['id'], $_POST['text'], $_SESSION['user'], date('Y-m-d'));
					unset($_POST);
					header('Location: post.php?id=' . $_GET['id']);
				}
				else{
					echo "<h2>Fill comment field before submiting!</h2>";
					unset($_POST);
				}
				unset($_POST);
			}
			unset($_POST);
		}
		else{
			echo "<h2>You need to be Signed In in order to post comments</h2>";
		}

	?>
</main>

<?php include 'footer.php'; ?>