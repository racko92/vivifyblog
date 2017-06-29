<?php include 'header.php'; ?>
<main>
	<?php 

		$userPosts = fetchRowsRelatedToRow('post', 'user_id', $_GET['id']);

	?>
	<section class="mainContainer">
		<table class="table">
			<tr class="tableFirstRow">
				<th class="firstTh">Name</th>
				<th>Options</th>
			</tr>
			<?php 
			foreach($userPosts as $value){
				echo "<tr>";
					echo "<td>" . $value['title'] . "</td>";
					echo "<td class=\"tdOptions\">". $value['text'] . "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</section>
	<section class="mainContainer">
		<form>
			<h2>Add New Post</h2>
			<label>Email</label>
			<input class="formField" type="email" name="email" placeholder="Email">
			<label>Your Message</label>
			<textarea rows="10" cols="50" placeholder="Write what's on your mind"></textarea>
			<div class="buttons">
				<button value="Submit">Send</button>
			</div>
		</form>
		<?php 

			

		?>
	</section>
</main>
<?php include 'footer.php'; ?>