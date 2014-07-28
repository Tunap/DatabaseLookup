<div id="space-bar">
	<h2>Login</h2>
</div>
<br>
<?php
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		
		$log = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
		$log->bindValue(":username",$username,PDO::PARAM_STR);
		$log->bindValue(":password",$password,PDO::PARAM_STR);
		$log->execute();


		if(count($log->fetchAll()) <= 0){
			echo 'Username or password invalid';
		}else{
			$_SESSION['username'] = $username;
			Header("Location: index.php?site=loggedin");
		}
	}


?>
<form action="" method="POST">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" class="inputs" name="username"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" class="inputs" name="password"></td>
		</tr>
	</table>
	<br><br>
	<input type="submit" class="button" name="login" value="Login">
</form>