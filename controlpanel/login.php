<?php 
$pageTitle = 'Control Panel';
include('../assets/includes/backend/include.php');

if(!$user->is_logged_in()) {
	include('../assets/includes/layout/header.php');

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($user->login($username, $password)){ 
			$_SESSION['username'] = $username;
			header('Location: '. DIR);
			exit;
		}
		else {
			$error[] = 'Incorrect username or password.';
		}
	}
	?>

	<style type="text/css">
	input {
		padding: 25px 0 !important;
		border-radius: 0 !important;
	}
	.btn-primary {
		border: none;
		border-radius: 0;
		padding: 25px 0;
		background-color: #29CEE0;
		font-size: 16px;
		font-weight: 200;
		text-transform: uppercase;
	}
	.btn-primary:hover,
	.btn-primary:focus {
		background-color: #1282B1;
	}
	</style>

	<div id="login" class="section">
		<div class="container">
			<form role="form" method="post" action="" autocomplete="off">
				<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
					}
				}
				?>
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" style="text-align: center">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control" placeholder="password" tabindex="2" style="text-align: center">
				</div>
				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block" tabindex="3">
			</form>
		</div>
	</div>

	<?php
	include('../assets/includes/layout/footer.php');
}
else {
	header('Location: index');
}
?>