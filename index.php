<?php include 'header.php'; ?>
<?php 

?>
<main>
	<?php

		$post = fetchFromTable('post');

		foreach($post as $value){
			$user = fetchUserWhoPosted($value);
			echo '<section class="mainContainer">';
			echo '<a href="post.php?id=' . $value['id'] . '"><h2>' . $value['title'] . '</h2></a>';
			echo "<p class=\"postedBy\">" . $user['name'] . " posted on: " . $value['created_at'] . "</p>";
			echo "<p class=\"postContent\">" . $value['text'] . "</p>";
			echo "</section>";
		}
	?>
	<section class="postLinks">
		<a href="#">Older</a>
		<a href="#">Newer</a>
	</section>
</main>



<?php include 'footer.php'; ?>