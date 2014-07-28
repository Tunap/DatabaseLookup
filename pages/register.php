                                <div id="space-bar">
	<h2>Register</h2>
</div>
<br>
<?php
        
        
	if(!isset($index)){ Header("Location: ../index.php"); exit; }
	
	if(isset($_POST['register'])){
		$username = $_POST['username'];		
                $password = sha1($_POST['password']);
                
		$email = $_POST['email'];
		$skype = $_POST['skype'];
		$refer = $_POST['referedby'];
                

		$usn = $pdo->prepare("SELECT * FROM users WHERE username = :username");
		$usn->bindValue(":username",$username,PDO::PARAM_STR);
		$usn->execute();
		
		$ymn = $pdo->prepare("SELECT * FROM email WHERE email = :email");
		$ymn->bindValue(":email",$email,PDO::PARAM_STR);
		$ymn->execute();

		
		if(count($usn->fetchAll()) > 0) {
			echo 'Username already in use';
		}elseif(count($ymn->fetchAll()) > 0) {
			echo 'Email already in use';
		}elseif(strlen($_POST['password']) <= 3){
			echo 'Password too shord (Max 3+ chars)';
                }elseif(strlen($_POST['email']) <= 3){
			echo 'No email entered';
		}else{
			$ins = $pdo->prepare("INSERT INTO users (username,email,password,skype,referedby) VALUES (:username,:email,:password,:skype,:referedby)");
			$ins->bindValue(":username",$username,PDO::PARAM_STR);
			$ins->bindValue(":email",$email,PDO::PARAM_STR);
			$ins->bindValue(":password",$password,PDO::PARAM_STR);
			$ins->bindValue(":skype",$skype,PDO::PARAM_STR);
			$ins->bindValue(":referedby",$refer,PDO::PARAM_STR);
			$ins->execute();
                        Header("Location: index.php?site=welcome");
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
		<tr>
			<td>Email:</td>
			<td><input type="text" class="inputs" name="email"></td>
		</tr>
		<tr>
			<td>Skype:</td>
			<td><input type="text" class="inputs" name="skype"></td>
		</tr>
		<tr>
			<td>Referred by:</td>
			<td><input type="text" class="inputs" name="referedby"></td>
		</tr>
	</table>
	<br><br>
		<input type="submit" class="button" name="register" value="Register">
                <br>
                
</form>
                            