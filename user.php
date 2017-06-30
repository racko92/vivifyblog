<?php include 'header.php'; ?>
<main>
	<?php 

		if(array_key_exists('id', $_GET)){
			$userPosts = fetchRowsRelatedToRow('post', 'user_id', $_GET['id']);
		}
		else{
			header('Location: signin.php');
		}
	?>
	<section class="mainContainer">
		<table class="table">
			<tr class="tableFirstRow">
				<th class="firstTh">Name</th>
				<th>Options</th>
				<?php 
					if(array_key_exists('logged', $_SESSION)){
						if($_SESSION['logged'] == true){
							echo '<th>Delete post</th>';
						}
					}
				?>
			</tr>
			<?php 
			foreach($userPosts as $value){
				echo "<tr>";
					echo "<td>" . $value['title'] . "</td>";
					echo "<td class=\"tdOptions\">". $value['text'] . "</td>";
					if(array_key_exists('logged', $_SESSION)){
						if($_SESSION['logged'] == true){
							echo '<td class="deleteButton"><a href="?id=' . $_GET['id'] . '&delete=' . $value['id'] . '">X</a></td>';
						}
					}
				echo "</tr>";
			}
			if(array_key_exists('delete', $_GET)){
				deletePost($_GET['delete']);
        		echo('<h2>Post deleted!</h2>');
        		header('Location: user.php?id=' . $_GET['id']);
			}
			?>
		</table>
	</section>
	<section class="mainContainer">
		<form method="post">
			<h2>Add New Post</h2>
			<label>Post title</label>
			<input class="formField" type="text" name="title" placeholder="Post Title">
			<label>Category</label>
			<select class="formField" name="category">
				<?php 
					$categories = fetchAllFromTable('category');
					foreach($categories as $value){
						echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
					}
				?>
			</select>
			<label>Post content</label>
			<textarea name="text" rows="10" cols="50" placeholder="Here goes some post content"></textarea>
			<div class="buttons">
				<button type="submit" name="submit">Send</button>
			</div>
		</form>
		<?php 
		if(array_key_exists('submit', $_POST)){
			if(!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['category'])){

				addPost($_POST['title'], $_GET['id'], $_POST['text'], $_POST['category'], date('Y-m-d'));
				header('Location: user.php?id=' . $_GET['id']);
				unset($_POST);

			}
			else{
				echo "Some fields are empty. Please fill all fields!";
				unset($_POST);
			}
		}
			
		?>
	</section>
</main>
<?php include 'footer.php'; ?>