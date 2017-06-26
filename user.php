<?php include 'header.php'; ?>
<main>
	<section class="mainContainer">
		<table class="table">
			<tr class="tableFirstRow">
				<th class="firstTh">Name</th>
				<th>Options</th>
			</tr>
			<tr>
				<td>Value1</td>
				<td>Option1</td>
			</tr>
		</table>
	</section>
	<section class="mainContainer">
		<form>
			<h2>Add New Post</h2>
			Email
			<input class="formField" type="email" name="email" placeholder="Email">
			Your Message
			<textarea rows="10" cols="50" placeholder="Write what's on your mind"></textarea>
			<div class="buttons">
				<button value="Submit">Send</button>
			</div>
		</form>
	</section>
</main>
<?php include 'footer.php'; ?>