<?php 
	include 'header.php'; 
?>
<main>
	<section class="mainContainer">
		<form method="post">
			<label>Email</label>
			<input class="formField" type="email" name="email" placeholder="Email">
			<label>Password</label>
			<input class="formField" type="password" name="password" placeholder="Password">
			<div class="buttons">
				<button type="submit">Sign in</button>
				<button type="button" onclick="window.location.href='/vivifyblog/register.php'">Sign Up</button>
			</div>

		</form>
		<?php 

		$users = fetchAllFromTable('users');
		if(empty($_POST) == false){
			foreach($users as $value){
				if($_POST['email'] == $value['email'] && $_POST['password'] == $value['password']){
					$_SESSION['logged'] = true;
					header('Location: user.php?id=' . $value['id']);
					die();
				}
				else if($_POST['email'] == $value['email'] && $_POST['password'] != $value['password']){
					echo "Wrong password!";
					die();
				}
			}
			echo "Press 'Sign Up' button to register!";
		}

		?>
	</section>
</main>

<?php include 'footer.php'; ?>