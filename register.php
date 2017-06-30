<?php include 'header.php'; ?>

<main>
	<section class="mainContainer">
		<form method='post'>
			<label>Name</label>
			<input class="formField" type="text" name="name" placeholder="Name">
			<label>Email</label>
			<input class="formField" type="email" name="email" placeholder="Email">
			<label>Password</label>
			<input class="formField" type="password" name="password" placeholder="Password">
			<div class="buttons">
				<button type="submit" name="submit">Sign Up</button>
			</div>
		</form>
		<?php
			if(array_key_exists('logged', $_SESSION)){
				if($_SESSION['logged'] = true){	
					header('Location: user.php?id=' . $_SESSION['user']);
				}
			}	

			$usersOld = fetchAllFromTable('users');

			if(array_key_exists('submit', $_POST)){
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){

				foreach($usersOld as $value){
					if($value['email'] == $_POST['email']){
						unset($_POST);
						die("User with email: '" . $value['email'] . "' already existing.");
					}
					else{
						registerUser($_POST['name'], $_POST['email'], $_POST['password']);
						unset($_POST);
						header('Location: signin.php?');
						die('New user created');
					}
				}
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