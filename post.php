<?php include 'header.php'; ?>
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
			$userCommented = fetchUserWhoPosted($post);
			$comments = fetchCommentsOnPost($post);
			dump($comments);
		// echo '<h4 class="comentedBy">' . $comments['created_at'] .  ' by ' . $userCommented['name'] . '</h4>';
		// echo '<p>' . $comment['text'] . '</p>';
	?>
	</section>
	<section class="postComment">
		<textarea class="commentArea" placeholder="Write your comment"></textarea>
			<div class="buttons">
				<button value="Submit">Comment</button>
			</div>	
	</section>
</main>

<?php include 'footer.php'; ?>